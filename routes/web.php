<?php

use App\Http\Controllers\Admin\CategoriaController as AdminCategoriaController;
use App\Http\Controllers\Admin\PedidoController as AdminPedidoController;
use App\Http\Controllers\Admin\ProductoController as AdminProductoController;
use App\Http\Controllers\CatalogoController;
use App\Http\Controllers\PaginasController;
use App\Http\Controllers\PedidoController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', [CatalogoController::class, 'index'])->name('home');

Route::get('/catalogo', [CatalogoController::class, 'index'])->name('catalogo.index');
Route::get('/catalogo/{producto}', [CatalogoController::class, 'show'])->name('catalogo.show');
Route::post('/pedidos', [PedidoController::class, 'store'])->name('pedidos.store');
Route::get('/pedidos/{pedido}/gracias', [PedidoController::class, 'gracias'])->name('pedidos.gracias');
Route::get('/seguimiento-pedido/{token}', [PedidoController::class, 'seguimiento'])->name('pedidos.seguimiento');

// Calificaciones y Comentarios (requieren autenticación)
Route::middleware(['auth'])->group(function () {
    Route::post('/productos/{producto}/calificaciones', [CatalogoController::class, 'storeCalificacion'])->name('productos.calificaciones.store');
    Route::post('/productos/{producto}/comentarios', [CatalogoController::class, 'storeComentario'])->name('productos.comentarios.store');
});

// Páginas estáticas
Route::get('/quienes-somos', [PaginasController::class, 'quienesSomos'])->name('quienes-somos');
Route::get('/contacto', [PaginasController::class, 'contacto'])->name('contacto');
Route::get('/terminos', [PaginasController::class, 'terminos'])->name('terminos');
Route::get('/privacidad', [PaginasController::class, 'politicaPrivacidad'])->name('privacidad');

Route::middleware(['auth'])->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/dashboard', fn () => redirect()->route('admin.productos.index'))->name('dashboard');

    Route::prefix('admin')->name('admin.')->group(function () {
        Route::get('/', fn () => redirect()->route('admin.productos.index'))->name('dashboard');
        Route::resource('categorias', AdminCategoriaController::class)->except(['show']);
        Route::get('productos/carga-masiva', [AdminProductoController::class, 'bulkCreate'])->name('productos.bulk');
        Route::post('productos/carga-masiva', [AdminProductoController::class, 'bulkStore'])->name('productos.bulk.store');
        Route::resource('productos', AdminProductoController::class)->except(['show']);
        Route::get('pedidos', [AdminPedidoController::class, 'index'])->name('pedidos.index');
        Route::get('pedidos/{pedido}', [AdminPedidoController::class, 'show'])->name('pedidos.show');
        Route::patch('pedidos/{pedido}', [AdminPedidoController::class, 'update'])->name('pedidos.update');
    });
});

require __DIR__.'/auth.php';
