<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Str;

use App\ModelBlog;

class Blog extends Controller
{
    
    public function blogindex(){
        $blogs = ModelBlog::orderBy('created_at','DESC')->paginate(5);
        return view('admin.blog.index', ['blogs'=> $blogs]);
    }

    
    public function blogstore(Request $request){

        request()->validate([
            "titulo" => "required",
            "contenido" => "required",
            "img" => "required|mimes:jpg,jpeg,png|max:2000",
        ]);

        // asignamos el elemnto a una varuable
         $file           = $request->file("img");
        // extraemos el nombre del archivo, para guardarlo con ese mismo nombre
        $nombrearchivo  = $file->getClientOriginalName();

        $url = Str::slug($request->titulo,'-');

        $datos = [
            'titulo'    => request('titulo'),
            'contenido' => request('contenido'),
            'img'     => $nombrearchivo,
            'url'     => $url,
        ];

        // insertamos los datos en la DB
        Blog::create($datos);
        
        // movemos el archivo a una ruta dentro de la carpeta public
        $file->move(public_path("assets/img-subidas/"),$nombrearchivo);

        return redirect()->route('admin-blog')->with('status-blog','ok');
    }

    public function blogupdate(Request $request, $id){

        if(empty(request('img'))){
            request()->validate([
                "titulo" => "required",
                "contenido" => "required",
            ]);

            $url = Str::slug($request->titulo,'-');

            $datosNow = Blog::find($id);
            $datosNow->titulo = request('titulo');
            $datosNow->contenido = request('contenido');
            $datosNow->url = $url;

            $datosNow->save();

            return redirect()->route('admin-blog')->with('status-blog-update','ok');

        }else{
            request()->validate([
                "titulo" => "required",
                "contenido" => "required",
                "img" => "required|mimes:jpg,jpeg,png|max:2000",
            ]);
    
            // asignamos el elemnto a una varuable
             $file           = $request->file("img");
            // extraemos el nombre del archivo, para guardarlo con ese mismo nombre
            $nombrearchivo  = $file->getClientOriginalName();
    
            $url = Str::slug($request->titulo,'-');
    
            $datosNow = Blog::find($id);
            $datosNow->titulo = request('titulo');
            $datosNow->contenido = request('contenido');
            $datosNow->img = $nombrearchivo;
            $datosNow->url = $url;

            $datosNow->save();
            
            // movemos el archivo a una ruta dentro de la carpeta public
            $file->move(public_path("assets/img-subidas/"),$nombrearchivo);
    
            return redirect()->route('admin-blog')->with('status-blog-update','ok');
        }

    }

    public function blogdestroy($id){
        Blog::find($id)->delete();
        return redirect()->route('admin-blog')->with('status-blog-destroy','ok');
    }

}
