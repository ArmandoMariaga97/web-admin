<?php

namespace App\Http\Livewire;

use Illuminate\Support\Str;

use Livewire\Component;
// necesario para la paginacion en LiveWire
use Livewire\WithPagination;
// necesario para la carga de archivos
use Livewire\WithFileUploads;

class GaleriaComponent extends Component
{
    // necesario para paginacion en LiveWire, de lo contrari bota error
    use WithPagination;
    //necesario par al accraga de archivos
    use WithFileUploads;

    public $open = false;
    public $photos = [];

    public function render()
    {
        return view('livewire.galeria.galeria-component');
    }

    public function cargarfotos(){
        $this->validate([
            'photos.*' => 'image|max:1024',
        ]);

        foreach ($this->photos as $photo) {

            $random = Str::random(50);
            $file = $photo->getClientOriginalName();
            $extension = pathinfo($file, PATHINFO_EXTENSION);
            $url_img = $random.'.'.$extension;

            $photo->storeAs('galeria' , $url_img);
        }

        $this->reset('photos');
        session()->flash('photos-success', 'ok');


    }
}
