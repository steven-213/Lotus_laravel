<?php

namespace App\Http\Controllers;
use App\Models\Producto;



class ProductoController extends Controller
{
    public function index()

    {
        $productos=Producto::all();
        return view('Productos.index',compact('productos'));
    }
}
