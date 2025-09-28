<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Servicio;

class ServicioController extends Controller
{
    /**
     * Mostrar todos los servicios para usuarios.
     */
    public function index()
    {
        $servicios = Servicio::all();
        return view('Servicios.index', compact('servicios'));
    }

    /**
     * Mostrar todos los servicios en el dashboard (administradores).
     */
    public function index_dashboard()
    {
        $servicios = Servicio::all();
        return view('dashboard.servicios.index', compact('servicios'));
    }

    /**
     * Formulario para crear un nuevo servicio.
     */
    public function create()
    {
        return view('dashboard.servicios.create');
    }

    /**
     * Guardar un nuevo servicio.
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

        $servicio = $request->all();

        if ($request->hasFile('imagen')) {
            $ruta = $request->file('imagen')->store('servicios', 'public');
            $servicio['imagen'] = $ruta;
        }

        Servicio::create($servicio);

        return redirect()->route('servicio_dashboard.index');
    }

    /**
     * Editar un servicio.
     */
    public function edit($id)
    {
        $servicio = Servicio::find($id);
        return view('dashboard.servicios.edit', compact('servicio'));
    }

    /**
     * Actualizar un servicio.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nombre' => 'required|string|min:3|max:255',
            'precio' => 'required|integer|min:1',
            'descripcion' => 'required|string|min:3|max:255',
            'imagen' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $servicio = Servicio::find($id);
        $datos = $request->only(['nombre', 'precio', 'descripcion']);

        if ($request->hasFile('imagen')) {
            $ruta = $request->file('imagen')->store('servicios', 'public');
            $datos['imagen'] = $ruta;
        }

        $servicio->update($datos);

        return redirect()->route('servicio_dashboard.index');
    }

    /**
     * Eliminar un servicio.
     */
    public function destroy($id)
    {
        $servicio = Servicio::find($id);
        $servicio->delete();
        return redirect()->route('servicio_dashboard.index');
    }
}
