<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CalendarController;
use App\Http\Controllers\ProductoController;
use GuzzleHttp\Handler\Proxy;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('index');
});


// RUTAS PARA INICIO DE SESIÓN

Route::get('/login', function () {
    return view('inicio_sesion');
})->name('login');


// RUTAS PARA REGISTRO DE USUARIO   

Route::get('/register', function () {
    return view('');
})->name('register');




// RUTAS PARA  AUTENTICACIÓN


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');



Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
require __DIR__.'/auth.php';


// RUTAS PARA EL CALENDARIO



Route::get('calendar/index', [CalendarController::class, 'index'])->name('calendar.index');
Route::post('calendar', [CalendarController::class, 'store'])->name('calendar.store');
Route::patch('calendar/update/{id}', [CalendarController::class, 'update'])->name('calendar.update');
Route::delete('calendar/destroy/{id}', [CalendarController::class, 'destroy'])->name('calendar.destroy');



// RUTAS PARA PRODUCTOS

Route::get('/productos', [ProductoController::class, 'index'])->name('producto.index');




//RUTAS PARA DASHBOARD_PRODUCTOS


Route::get('productos/index', [ProductoController::class, 'index_dashboard'])->name('producto_dashboard.index');
Route::get('productos/create', [ProductoController::class, 'create'])->name('producto.create');
Route::get('productos/edit/{id}', [ProductoController::class, 'edit'])->name('producto.edit');


//Route::post('productos', [ProductoController::class, 'store'])->name('producto.store');
Route::patch('productos/update/{id}', [ProductoController::class, 'update'])->name('producto.update');
Route::delete('productos/destroy/{id}', [ProductoController::class, 'destroy'])->name('producto.destroy');




/*// RUTAS PARA SERVICIOS

Route::get('producto/index', [ProductoController::class, 'index'])->name('producto.index');
Route::post('producto', [ProductoController::class, 'create'])->name('producto.create');
Route::patch('calendar/update/{id}', [CalendarController::class, 'update'])->name('calendar.update');
Route::delete('calendar/destroy/{id}', [CalendarController::class, 'destroy'])->name('calendar.destroy');




//RUTAS PARA DASHBOARD_SERVICIOS


Route::get('students/index', [ProductoController::class, 'indexs'])->name('students.index');
Route::get('students/create', [ProductoController::class, 'create'])->name('students.create');
Route::get('students/edit/{id}', [ProductoController::class, 'edit'])->name('students.edit');


Route::post('students', [ProductoController::class, 'store'])->name('students.store');
Route::patch('students/update/{id}', [ProductoController::class, 'update'])->name('students.update');
Route::delete('students/destroy/{id}', [ProductoController::class, 'destroy'])->name('students.destroy');

*/

// RUTAS PARA NOSOTROS-VISTA

Route::get('/conocenos', function () {
    return view('nosotros.index');
})->name('nosotros.index');

