<?php

namespace App\Http\Livewire;

use Illuminate\Support\Str;

use Livewire\Component;
// necesario para la paginacion en LiveWire
use Livewire\WithPagination;
// necesario para la carga de archivos
use Livewire\WithFileUploads;

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
                'photos.*' => 'required|image|max:1024',
        ]);

        foreach ($this->photos as $photo) {

            $random = Str::random(50);
            $file = $photo->getClientOriginalName();
            $extension = pathinfo($file, PATHINFO_EXTENSION);
            $url_img = $random.'.'.$extension;

            $photo->storeAs('galeria' , $url_img);

            ModelGaleria::create([
                'url_img' => $url_img,
            ]);
        }

        $this->reset('photos');
        session()->flash('photos-success', 'ok');


    }

    public function deleteForPhotos($cont){
        // elimnar elemento del array segun su posicion
        unset($this->photos[$cont]);
        // refrescamos el array con las nuevas posiciones
        $this->photos = array_values($this->photos);
    }

    public function delete($id){
        ModelGaleria::destroy($id);
        session()->flash('delete-img-success', "ok.$id");
    }

    public function limpiarphotos(){
        $this->photos = [];
    }

}
