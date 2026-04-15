<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ContactoController;
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
