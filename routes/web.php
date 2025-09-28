<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CalendarController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\ServicioController;
use Illuminate\Support\Facades\Route;


// RUTAS PÚBLICAS

Route::get('/', function () {
    return view('index');
});

Route::get('/login', function () {
    return view('inicio_sesion');
})->name('login');

Route::get('/register', function () {
    return view(''); 
})->name('register');

Route::get('/conocenos', function () {
    return view('nosotros.index');
})->name('nosotros.index');



// RUTAS AUTENTICACIÓN 

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/dashboard', function () {
    return view('dashboard.admin');
})->middleware(['auth', 'verified','role:admin'])->name('dashboard_admin_');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';



// RUTAS CALENDARIO

Route::middleware(['auth','role:admin'])->group(function () {
    Route::get('calendar/index', [CalendarController::class, 'index'])->name('calendar.index');
    Route::post('calendar', [CalendarController::class, 'store'])->name('calendar.store');
    Route::patch('calendar/update/{id}', [CalendarController::class, 'update'])->name('calendar.update');
    Route::delete('calendar/destroy/{id}', [CalendarController::class, 'destroy'])->name('calendar.destroy');
});



// RUTAS PRODUCTOS

Route::get('/productos', [ProductoController::class, 'index'])->name('producto.index');

// RUTAS DE ADMINISTRACIÓN PRODUCTOS
Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('productos/index', [ProductoController::class, 'index_dashboard'])->name('producto_dashboard.index');
    Route::get('productos/create', [ProductoController::class, 'create'])->name('producto.create');
    Route::post('productos', [ProductoController::class, 'store'])->name('producto.store');
    Route::get('productos/edit/{id}', [ProductoController::class, 'edit'])->name('producto.edit');
    Route::patch('productos/update/{id}', [ProductoController::class, 'update'])->name('producto.update');
    Route::delete('productos/destroy/{id}', [ProductoController::class, 'destroy'])->name('producto.destroy');
});


// RUTAS SERVICIOS (para usuarios)
Route::get('/servicios', [ServicioController::class, 'index'])->name('servicio.index');

// RUTAS DE ADMINISTRACIÓN SERVICIOS
Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('servicios/index', [ServicioController::class, 'index_dashboard'])->name('servicio_dashboard.index');
    Route::get('servicios/create', [ServicioController::class, 'create'])->name('servicio.create');
    Route::post('servicios', [ServicioController::class, 'store'])->name('servicio.store');
    Route::get('servicios/edit/{id}', [ServicioController::class, 'edit'])->name('servicio.edit');
    Route::patch('servicios/update/{id}', [ServicioController::class, 'update'])->name('servicio.update');
    Route::delete('servicios/destroy/{id}', [ServicioController::class, 'destroy'])->name('servicio.destroy');
});




// RUTA ADMIN

Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/admin', function () {
        return view('dashboard.admin');
    })->name('dashboard.admin');

});



// RUTAS DE ADMINISTRACIÓN USUARIOS

Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('usuarios/index', [UsuarioController::class, 'index_dashboard'])->name('usuario.index');
    Route::get('usuarios/create', [UsuarioController::class, 'create'])->name('usuario.create');
    Route::post('usuarios', [UsuarioController::class, 'store'])->name('usuario.store');
    Route::get('usuarios/edit/{id}', [UsuarioController::class, 'edit'])->name('usuario.edit');
    Route::patch('usuarios/update/{id}', [UsuarioController::class, 'update'])->name('usuario.update');
    Route::delete('usuarios/destroy/{id}', [UsuarioController::class, 'destroy'])->name('usuario.destroy');
});