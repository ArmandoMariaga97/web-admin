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
    

    public function render()
    {
        $blogs = ModelBlog::orderBy('created_at','DESC')->paginate(5);
        return view('livewire.blog.blog-component',['blogs' => $blogs]);
    }

    public function cerrarform(){
        $this->form = 'create_blog';
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

            $this->reset(['titulo', 'contenido', 'img']);

            session()->flash('store-success', 'ok');
    }
        
    public function edit($id){

        $blogold = ModelBlog::find($id);
        $this->idblog  = $blogold->id;
        $this->titulo = $blogold->titulo;
        $this->contenido = $blogold->contenido;
        $this->img = $blogold->img;
    }

    public function update(){
        $this->validate([
            'titulo' => 'required',
            'contenido' => 'required',
        ]);


            $urlnow  = Str::slug($this->titulo, '-');
            
            $blog = ModelBlog::find($this->idblog);

            $blog->update([
                'titulo'    => $this->titulo,
                'url'       => $urlnow,
                'contenido' => $this->contenido,
                ]);
    
            $this->reset(['titulo', 'contenido', 'img']);
    
            session()->flash('update-success', 'ok');
    }

    public function destroy($id){
        ModelBlog::destroy($id);
        session()->flash('delete-success', 'ok');
    }
}
    