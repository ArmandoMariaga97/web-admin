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
    
    public function store(){

        $this->validate([
            'titulo' => 'required',
            'contenido' => 'required',
            'img' => 'required|image|max:2048',
        ]);

         $urlnow  = Str::slug($this->titulo, '-');

         $random = Str::random(50);
         $file = $this->img->getClientOriginalName();
         $extension = pathinfo($file, PATHINFO_EXTENSION);
         $url_img = $random.'.'.$extension;
        
         ModelBlog::create([
             'titulo'    => $this->titulo,
             'url'       => $urlnow,
             'contenido' => $this->contenido,
             'img'       => $url_img,
             ]);
            
             $this->img->storeAs('blog' , $url_img);

             $this->limpiarDatos();

             session()->flash('store-success', 'ok');
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

            $random = Str::random(50);
            $file = $this->img->getClientOriginalName();
            $extension = pathinfo($file, PATHINFO_EXTENSION);
            $url_img = $random.'.'.$extension;

            $blog = ModelBlog::find($this->idblog);
    
            $blog->update([
                'titulo'    => $this->titulo,
                'url'       => $urlnow,
                'contenido' => $this->contenido,
                'img'       => $url_img,
                ]);

            $this->img->storeAs('blog' , $url_img);

        }
            $this->limpiarDatos();
            session()->flash('update-success', 'ok');
            
    }

    public function destroy($id){
        ModelBlog::destroy($id);
        session()->flash('delete-success', 'ok');
    }

    public function limpiarDatos(){
        $this->reset(['titulo', 'contenido', 'img']);
        $this->open = false;
        $this->form_create = true;
    }
}
    