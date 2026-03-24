<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ContactoController;
use App\Http\Controllers\TestimonioController;
use App\Http\Controllers\ImageGeneratorController;



//     // Rutas del perfil (de Breeze)
Route::middleware(['auth'])->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // ✅ Panel de administración
    Route::get('/admin/contactos', [AdminController::class, 'index'])->name('admin.contactos');
    Route::get('/admin/contactos/listado', [AdminController::class, 'listadoMensajes'])->name('admin.contactos.listado');
    Route::delete('/admin/contactos/{id}', [AdminController::class, 'eliminar'])->name('admin.contactos.eliminar');
    Route::get('/admin/testimonios', [AdminController::class, 'testimonios'])->name('admin.testimonios');
    Route::delete('/admin/testimonios/{id}', [AdminController::class, 'eliminarTestimonio'])->name('admin.testimonios.eliminar');
});



// Página pública
// Route::get('/', function () {
//     return view('home'); // Página de inicio
// })->name('home');

Route::get('/servicios', function () {
    return view('servicios');
})->name('servicios');

Route::get('/quienessomos', function () {
    return view('quienessomos');
})->name('quienessomos');

Route::get('/privacidad', function () {
    return view('privacidad');
})->name('privacidad');

Route::get('/terminos', function () {
    return view('terminos');
})->name('terminos');


//ruta de testimonios usuarios
Route::post('/testimonios', [TestimonioController::class, 'store'])->name('testimonios.store');
Route::get('/', [TestimonioController::class, 'home'])->name('home');


Route::view('/terminos-y-condiciones', 'terminos')->name('terminos');


// rutas de administracion para panel de control y envio de correo electronico
Route::get('/contacto', [ContactoController::class, 'index'])->name('contacto');
Route::post('/contacto', [ContactoController::class, 'enviar'])->name('contacto.enviar');


Route::get('/dashboard', function () {
    return redirect()->route('admin.contactos');
})->middleware(['auth'])->name('dashboard');


require __DIR__.'/auth.php';
