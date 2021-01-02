<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Photos extends Controller
{
    public function cargarfotosdroopzone(Request $request){
        $request->validate([
            'file' => 'required|image|max:2048'
        ]);

        $imagenes = $request->file('file')->store('public/imagenes');

        $url = Storage::url($imagenes);

        // File::create([
        //     'url' => $url
        // ]);
    }
}
