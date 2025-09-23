<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Producto;


class ProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $productos= Producto::all();
      // FUNCION COMPACT SIRVE PARA CREAR UN ARRAY ASOCIATIVO . CLAVES => LOS NOMBRES DE LOS VALORES O PUES LOS NOMBRES TITULO DE LAS TABLAS Y LOS VALORES => LAS VARIABLES QUE CONTIENEN LOS DATOS
      return view('Productos.index', compact('productos'));
    }

    public function index_dashboard()
    {
      $productos= Producto::all();
      // FUNCION COMPACT SIRVE PARA CREAR UN ARRAY ASOCIATIVO . CLAVES => LOS NOMBRES DE LOS VALORES O PUES LOS NOMBRES TITULO DE LAS TABLAS Y LOS VALORES => LAS VARIABLES QUE CONTIENEN LOS DATOS
      return view('dashboard.productos.index', compact('productos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.productos.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    $request->validate([
        'nombre' => 'required|string|min:3|max:255',
        'precio' => 'required|integer|min:1',
        'descripcion' => 'required|string|min:3|max:255',
        'imagen' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        
    ], [
        'nombre.required' => 'El campo nombre es obligatorio.',
        'nombre.min' => 'El nombre debe tener al menos 3 caracteres.',
        'precio.required' => 'El campo precio es obligatorio.',
        'precio.integer' => 'El precio debe ser un número entero.',
        'precio.min' => 'El precio debe ser mayor que 0.',
        'descripcion.required' => 'El campo descripción es obligatorio.',
        'descripcion.min' => 'La descripción debe tener al menos 3 caracteres.',
        'imagen.image' => 'El archivo debe ser una imagen.',
        'imagen.mimes' => 'Solo se permiten imágenes en formato JPG o PNG.',
        'imagen.max' => 'La imagen no debe pesar más de 2 MB.'
    ]);
    
    $producto = $request->all();

    
    if ($request->hasFile('imagen')) {
        $ruta = $request->file('imagen')->store('productos', 'public');
        $producto['imagen'] = $ruta;
    }
    
        Producto::create($producto);
        return redirect()->route('producto_dashboard.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $producto = Producto::find($id);
        return view('dashboard.productos.edit', compact('producto'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
        'nombre' => 'required|string|min:3|max:255',
        'precio' => 'required|integer|min:1',
        'descripcion' => 'required|string|min:3|max:255',
        'imagen' => 'nullable|image|mimes:jpg,jpeg,png|max:2048'
    ], [
        'nombre.required' => 'El campo nombre es obligatorio.',
        'nombre.min' => 'El nombre debe tener al menos 3 caracteres.',
        'precio.required' => 'El campo precio es obligatorio.',
        'precio.integer' => 'El precio debe ser un número entero.',
        'precio.min' => 'El precio debe ser mayor que 0.',
        'descripcion.required' => 'El campo descripción es obligatorio.',
        'descripcion.min' => 'La descripción debe tener al menos 3 caracteres.',
        'imagen.image' => 'El archivo debe ser una imagen.',
        'imagen.mimes' => 'Solo se permiten imágenes en formato JPG o PNG.',
        'imagen.max' => 'La imagen no debe pesar más de 2 MB.'
    ]);
        $producto = Producto::find($id);

        $datos=$request->only(['nombre', 'precio', 'descripcion']);
        if ($request->hasFile('imagen')) {
        $ruta = $request->file('imagen')->store('productos', 'public');
        $datos['imagen'] = $ruta;
    }
        $producto->update($datos);
        
        return redirect()->route('producto_dashboard.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $producto = Producto::find($id);
        $producto->delete();
        return redirect()->route('producto_dashboard.index');
    }
}
