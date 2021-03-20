<?php

namespace App\Http\Livewire;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

use Livewire\Component;
// necesario para la paginacion en LiveWire
use Livewire\WithPagination;
// necesario para la carga de archivos
use Livewire\WithFileUploads;
// para redimensionar las img
use Intervention\Image\ImageManager;
use Intervention\Image\ImageManagerStatic;

use App\ModelGaleria;

class GaleriaComponent extends Component
{
    
    // necesario para paginacion en LiveWire, de lo contrari bota error
    use WithPagination;
    //necesario par al accraga de archivos
    use WithFileUploads;

    public $open    = false;
    public $photos  = [];
    public $cont    = 0;

    public function render()
    {
        $galerias = ModelGaleria::orderBy('created_at','DESC')->get();
        return view('livewire.galeria.galeria-component',['galerias' => $galerias]);
    }
       
    public function cargarfotos(){

        $this->validate([
            'photos.*' => 'required|image|max:2024',
        ]);

        foreach ($this->photos as $photo) {

            $name = Str::random(20).'.jpg';

            // redimencionamos la img y le cambiamos el formato
            $img = ImageManagerstatic::make($photo)->widen(500)->encode('jpg');

            // la guardamos en el storage
            Storage::disk('local')->put($name, $img);
            
             ModelGaleria::create([
                 'url_img' => $name,
             ]);
        }

        $this->reset('photos');
        $this->open = false;
        session()->flash('photos-success', 'ok');


    }

    public function deleteForPhotos($cont){
        // elimnar elemento del array segun su posicion
        unset($this->photos[$cont]);
        // refrescamos el array con las nuevas posiciones
        $this->photos = array_values($this->photos);
    }

    public function delete($id){
        
        $img =  ModelGaleria::find($id);
        // eliminamos el archivo del servidor
        Storage::disk('local')->delete($img->url_img);
        // eliminamos el archivo de la db
        $img->delete();

        session()->flash('delete-img-success', "ok.$id");
    }

    public function limpiarphotos(){
        $this->photos = [];
    }

}
