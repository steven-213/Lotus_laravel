<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SumaController extends Controller

//--------------------SE CREAN CONTROLADORES EN LARAVEL CON EN COMANDO : php artisan make:controller SumaController-------------------------
{
    public function index()
    {
        return view('suma', ['resultado' => null]);

    }
    public function sumar(Request $request)
    {
        $nm1 = $request->input('numero1');
        $nm2 = $request->input('numero2');
        $resultado = $nm1 + $nm2;
        return view("suma", ['resultado' => $resultado] );
    }
}
