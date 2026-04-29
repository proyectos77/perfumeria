<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Admin\CategoriaController as AdminCategoriaController;
use App\Http\Controllers\Admin\PedidoController as AdminPedidoController;
use App\Http\Controllers\Admin\ProductoController as AdminProductoController;
use App\Http\Controllers\AdminProjectController;
use App\Http\Controllers\AdminSiteSettingController;
use App\Http\Controllers\CatalogoController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ContactoController;
use App\Http\Controllers\PedidoController;
use App\Http\Controllers\SocialConnectionController;
use App\Http\Controllers\SocialPostController;
use App\Http\Controllers\SocialTemplateController;
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
    Route::get('/admin/social-posts', [SocialPostController::class, 'index'])->name('admin.social-posts.index');
    Route::get('/admin/social-posts/crear', [SocialPostController::class, 'create'])->name('admin.social-posts.create');
    Route::post('/admin/social-posts', [SocialPostController::class, 'store'])->name('admin.social-posts.store');
    Route::post('/admin/social-posts/generate', [SocialPostController::class, 'generate'])->name('admin.social-posts.generate');
    Route::patch('/admin/social-posts/{socialPost}/publish-linkedin', [SocialPostController::class, 'publishToLinkedIn'])->name('admin.social-posts.publish-linkedin');
    Route::get('/admin/social-posts/{socialPost}/editar', [SocialPostController::class, 'edit'])->name('admin.social-posts.edit');
    Route::put('/admin/social-posts/{socialPost}', [SocialPostController::class, 'update'])->name('admin.social-posts.update');
    Route::delete('/admin/social-posts/{socialPost}', [SocialPostController::class, 'destroy'])->name('admin.social-posts.destroy');
    Route::patch('/admin/social-posts/{socialPost}/publicado', [SocialPostController::class, 'markPublished'])->name('admin.social-posts.publish');
    Route::get('/admin/social-connections', [SocialConnectionController::class, 'index'])->name('admin.social-connections.index');
    Route::get('/admin/social-connections/meta/redirect', [SocialConnectionController::class, 'redirectMeta'])->name('admin.social-connections.meta.redirect');
    Route::get('/admin/social-connections/meta/callback', [SocialConnectionController::class, 'handleMetaCallback'])->name('admin.social-connections.meta.callback');
    Route::patch('/admin/social-connections/{socialPlatformConnection}/meta-page', [SocialConnectionController::class, 'selectMetaPage'])->name('admin.social-connections.meta.page');
    Route::get('/admin/social-connections/linkedin/redirect', [SocialConnectionController::class, 'redirectLinkedIn'])->name('admin.social-connections.linkedin.redirect');
    Route::get('/admin/social-connections/linkedin/callback', [SocialConnectionController::class, 'handleLinkedInCallback'])->name('admin.social-connections.linkedin.callback');
    Route::patch('/admin/social-connections/preferences', [SocialConnectionController::class, 'updatePreferences'])->name('admin.social-connections.preferences');
    Route::delete('/admin/social-connections/{socialPlatformConnection}', [SocialConnectionController::class, 'destroy'])->name('admin.social-connections.destroy');
    Route::get('/admin/social-templates', [SocialTemplateController::class, 'index'])->name('admin.social-templates.index');
    Route::get('/admin/social-templates/{template}', [SocialTemplateController::class, 'show'])->name('admin.social-templates.show');
    Route::post('/admin/social-templates/{template}/draft', [SocialTemplateController::class, 'storeDraft'])->name('admin.social-templates.store-draft');
    Route::get('/admin/site-settings', [AdminSiteSettingController::class, 'edit'])->name('admin.site-settings.edit');
    Route::put('/admin/site-settings', [AdminSiteSettingController::class, 'update'])->name('admin.site-settings.update');
    Route::get('/admin/projects', [AdminProjectController::class, 'index'])->name('admin.projects.index');
    Route::get('/admin/projects/create', [AdminProjectController::class, 'create'])->name('admin.projects.create');
    Route::post('/admin/projects', [AdminProjectController::class, 'store'])->name('admin.projects.store');
    Route::get('/admin/projects/{project}/edit', [AdminProjectController::class, 'edit'])->name('admin.projects.edit');
    Route::put('/admin/projects/{project}', [AdminProjectController::class, 'update'])->name('admin.projects.update');
    Route::delete('/admin/projects/{project}', [AdminProjectController::class, 'destroy'])->name('admin.projects.destroy');

    Route::prefix('admin')->name('admin.')->group(function () {
        Route::resource('categorias', AdminCategoriaController::class)->except(['show']);
        Route::resource('productos', AdminProductoController::class)->except(['show']);
        Route::get('pedidos', [AdminPedidoController::class, 'index'])->name('pedidos.index');
        Route::get('pedidos/{pedido}', [AdminPedidoController::class, 'show'])->name('pedidos.show');
        Route::patch('pedidos/{pedido}', [AdminPedidoController::class, 'update'])->name('pedidos.update');
    });
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

Route::view('/apolo', 'apolo')->name('apolo');


//ruta de testimonios usuarios
Route::post('/testimonios', [TestimonioController::class, 'store'])->name('testimonios.store');
Route::get('/', [TestimonioController::class, 'home'])->name('home');
Route::get('/catalogo', [CatalogoController::class, 'index'])->name('catalogo.index');
Route::get('/catalogo/{producto}', [CatalogoController::class, 'show'])->name('catalogo.show');
Route::post('/pedidos', [PedidoController::class, 'store'])->name('pedidos.store');
Route::get('/pedidos/{pedido}/gracias', [PedidoController::class, 'gracias'])->name('pedidos.gracias');


Route::view('/terminos-y-condiciones', 'terminos')->name('terminos');


// rutas de administracion para panel de control y envio de correo electronico
Route::get('/contacto', [ContactoController::class, 'index'])->name('contacto');
Route::post('/contacto', [ContactoController::class, 'enviar'])->name('contacto.enviar');


Route::get('/dashboard', function () {
    return redirect()->route('admin.contactos');
})->middleware(['auth'])->name('dashboard');


require __DIR__.'/auth.php';
