<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;


class UsuarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $usuarios= User::all();//ese metodo all() trae todos los registros de la tabla productos para los usuarios
      // FUNCION COMPACT SIRVE PARA CREAR UN ARRAY ASOCIATIVO . CLAVES => LOS NOMBRES DE LOS VALORES O PUES LOS NOMBRES TITULO DE LAS TABLAS Y LOS VALORES => LAS VARIABLES QUE CONTIENEN LOS DATOS
      return view('Usuarios.index', compact('usuarios'));
    }

    public function index_dashboard()
    {
      $usuarios= User::all();//este para los administradores
      // FUNCION COMPACT SIRVE PARA CREAR UN ARRAY ASOCIATIVO . CLAVES => LOS NOMBRES DE LOS VALORES O PUES LOS NOMBRES TITULO DE LAS TABLAS Y LOS VALORES => LAS VARIABLES QUE CONTIENEN LOS DATOS
      return view('dashboard.usuarios.index', compact('usuarios'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.usuarios.create');
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
        'name' => 'required|string|min:3|max:255',
        'email' => 'required|email|unique:users',
        'password' => 'required|string|min:6',
        
    ], [
        'name.required' => 'El campo nombre es obligatorio.',
        'name.min' => 'El nombre debe tener al menos 3 caracteres.',
        'email.required' => 'El campo email es obligatorio.',
        'email.email' => 'Debe ser un correo válido.',
        'email.unique' => 'Este correo ya está registrado.',
        'password.required' => 'El campo contraseña es obligatorio.',
        'password.min' => 'La contraseña debe tener al menos 6 caracteres.'
    ]);
    
    $usuario = $request->all();
    $usuario['password'] = bcrypt($usuario['password']); // encriptar contraseña
    
        User::create($usuario);
        return redirect()->route('usuario.index');
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
        $usuario = User::find($id);
        return view('dashboard.usuarios.edit', compact('usuario'));
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
        'name' => 'required|string|min:3|max:255',
        'email' => 'required|email|unique:users,email,' . $id,
        'password' => 'nullable|string|min:6'
    ], [
        'name.required' => 'El campo nombre es obligatorio.',
        'name.min' => 'El nombre debe tener al menos 3 caracteres.',
        'email.required' => 'El campo email es obligatorio.',
        'email.email' => 'Debe ser un correo válido.',
        'email.unique' => 'Este correo ya está registrado.',
        'password.min' => 'La contraseña debe tener al menos 6 caracteres.'
    ]);
        $usuario = User::find($id);

        $datos=$request->only(['name', 'email']);
        if ($request->filled('password')) {
            $datos['password'] = bcrypt($request->password);
        }

        $usuario->update($datos);
        
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
        $usuario = User::find($id);
        $usuario->delete();
        return redirect()->route('producto_dashboard.index');
    }
}
