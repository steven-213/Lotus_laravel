<?php

namespace App\Http\Controllers;
use App\Models\Producto;

use GuzzleHttp\Handler\Proxy;
use Illuminate\Http\Request;

class ProductoController extends Controller
{
    public function index()

    {
        $productos=Producto::all();
        return view('Productos.index',compact('productos'));
    }
}
