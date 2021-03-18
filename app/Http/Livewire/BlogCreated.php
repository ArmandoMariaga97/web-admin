<?php

namespace App\Http\Livewire;

use Illuminate\Support\Str;

use Livewire\Component;
// necesario para la paginacion en LiveWire
use Livewire\WithPagination;
// necesario para la carga de archivos
use Livewire\WithFileUploads;
// necesario para cargar archivos

use Illuminate\Support\Facades\Storage;
use Intervention\Image\ImageManagerStatic;

use App\ModelBlog;

class BlogCreated extends Component
{
        // necesario para paginacion en LiveWire, de lo contrari bota error
        use WithPagination;
        //necesario par al accraga de archivos
        use WithFileUploads;
    
        public $idblog, $titulo, $contenido, $img;
        
    
        public function render(){
            return view('livewire.blog.blog-created');
        }
        
        public function store(){
    
            $this->validate([
                'titulo' => 'required',
                'contenido' => 'required',
                'img' => 'required|image|max:2048',
            ]);
    
             $urlnow  = Str::slug($this->titulo, '-');

             $name = Str::random(20).'.jpg';

            // redimencionamos la img y le cambiamos el formato
            $img = ImageManagerstatic::make($this->img)->widen(500)->encode('jpg');

            // la guardamos en el storage
            Storage::disk('local')->put($name, $img);
            
             ModelBlog::create([
                 'titulo'    => $this->titulo,
                 'url'       => $urlnow,
                 'contenido' => $this->contenido,
                 'img'       => $name,
                 ]);
                    
                 $this->limpiarDatos();
    
                 session()->flash('store-success', 'ok');
                 redirect()->route('blog');
        }
    
        public function limpiarDatos(){
            $this->reset(['titulo', 'contenido', 'img']);
            $this->open = false;
            $this->form_create = true;
        }

}
