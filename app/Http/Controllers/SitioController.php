<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contacto;

class SitioController extends Controller
{
    public function contacto($idContacto = null){

        if($idContacto == 1234){
            $nombre = "Juan Lopez";
            $correo = "jlopez@gmail.com";
        }else{
            $nombre = "";
            $correo = "";
        }
        return view('contacto', compact('nombre', 'correo'));
    }

    public function landing(){

        return view('landing');
    }

    public function recibeFormContacto(Request $request){
          //dd($request -> all());
         $request -> validate([
            'nombre' => ['required','max:70'],
            'correo' => 'required|max:50|email',
            'comentario' => 'required',
          ]);

          $contacto = new Contacto();
          $contacto->nombre = $request->nombre;
          $contacto->correo = $request->correo;
          $contacto->comentario = $request->comentario;
          $contacto->save();

        return redirect('/contacto');
    }

}
