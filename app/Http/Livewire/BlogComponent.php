<?php

namespace App\Http\Livewire;
use Illuminate\Support\Str;

use Livewire\Component;
// necesario para la paginacion en LiveWire
use Livewire\WithPagination;
// necesario para la carga de archivos
use Livewire\WithFileUploads;
// necesario para cargar archivos

use App\ModelBlog;

use Illuminate\Support\Facades\Storage;
use Intervention\Image\ImageManagerStatic;

class BlogComponent extends Component
{
    // necesario para paginacion en LiveWire, de lo contrari bota error
    use WithPagination;
    //necesario par al accraga de archivos
    use WithFileUploads;

    public $idblog, $titulo, $contenido, $img;
    public $open = false;
    public $form_create = true;
    

    public function render()
    {
        $blogs = ModelBlog::orderBy('created_at','DESC')->get();
        return view('livewire.blog.blog-component',['blogs' => $blogs]);
    }
    
        
    public function edit($id){

        $this->form_create = false;
        $this->open = true;

        $blogold = ModelBlog::find($id);
        $this->idblog  = $blogold->id;
        $this->titulo = $blogold->titulo;
        $this->contenido = $blogold->contenido;
    }

    public function update(){

        $this->validate([
            'titulo' => 'required',
            'contenido' => 'required',
        ]);

        $urlnow  = Str::slug($this->titulo, '-');
        
        if($this->img == ''){
    
            $blog = ModelBlog::find($this->idblog);
    
            $blog->update([
                'titulo'    => $this->titulo,
                'url'       => $urlnow,
                'contenido' => $this->contenido,
                ]);
                
        }else{

            $name = Str::random(20).'.jpg';

            // redimencionamos la img y le cambiamos el formato
            $img = ImageManagerstatic::make($this->img)->widen(500)->encode('jpg');

            // la guardamos la nueva en el storage
            Storage::disk('local')->put($name, $img);

            $blog = ModelBlog::find($this->idblog);
            
            // eliminamos la img anterior
            Storage::disk('local')->delete($blog->img);

            $blog->update([
                'titulo'    => $this->titulo,
                'url'       => $urlnow,
                'contenido' => $this->contenido,
                'img'       => $name,
                ]);

        }
            $this->limpiarDatos();
            session()->flash('update-success', 'ok');
            redirect()->route('blog');
            
    }

    public function destroy($id){
        $blogItem = ModelBlog::find($id);

        Storage::disk('local')->delete($blogItem->img);

        $blogItem->delete();

        session()->flash('delete-success', 'ok');
    }

    public function limpiarDatos(){
        $this->reset(['titulo', 'contenido', 'img']);
        $this->open = false;
        $this->form_create = true;
    }

    public function cambiarContent($cont){
        $this->content = $cont;
    }

}
    