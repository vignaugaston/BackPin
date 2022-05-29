<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Validator;
use App\Models\Mensaje;
use Illuminate\Http\Request;
use App\Mail\MensajeContacto;
use Illuminate\Support\Facades\Mail;

class PageController extends Controller
{
    public function storeApiMensaje(){

        
          //validar datos
        $validator = Validator::make(request()->all(), [
            'name'=>'required | min:3',
            'email'=>'required',
            'phone'=>'required | min:1',
            'message' =>'required',
        ]);
        //responde si hay error
        if ($validator ->fails()){
            return response([
                'error'=> true,
                'data'=> $validator -> errors()
            ],422);
        };
        
          //creo los datos

        $mensaje = Mensaje::create([
            'name' =>request()->name,
            'email'=>request()->email,
            'phone'=>request()->phone,
            'message'=>request()->message
        ]);
          //dd($mensaje);
          //envio de correo
        Mail::to('alexispuig_10@hotmail.com.ar')->send(new MensajeContacto($mensaje));
          //respuesta json
        return response([
            "meta" => [
                "mensaje" => "Gracias por su mensaje.",
                "codigo" => 201
            ],
            'data'=> $mensaje

        ],201);
    }
}
