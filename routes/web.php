<?php

use App\Http\Controllers\UserController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AnimalController;
use App\Http\Controllers\GestanteController;
use App\Http\Controllers\VacunaController;
use App\Http\Controllers\VentaController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    /*return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);*/
    return redirect('/animales');
});

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/about', fn () => Inertia::render('About'))->name('about');

    Route::get('users', [UserController::class, 'index'])->name('users.index');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('animales', [AnimalController::class, 'index'])->name('animales.index');
    Route::get('animales/create', [AnimalController::class, 'create'])->name('animales.create');
    Route::post('animales',[AnimalController::class, 'store'])->name('animales.store');
    Route::get('animales/{animal}/show',[AnimalController::class, 'show'])->name('animales.show');
    Route::get('animales/{id_animal}/edit',[AnimalController::class, 'edit'])->name('animales.edit');
    Route::post('animales/{id_animal}',[AnimalController::class, 'update'])->name('animales.update');
    Route::delete('animales/{id_animal}',[AnimalController::class, 'destroy'])->name('animales.destroy');

    Route::get('gestantes', [GestanteController::class, 'index'])->name('gestantes.index');
    Route::get('gestantes/create', [GestanteController::class, 'create'])->name('gestantes.create');
    Route::post('gestantes',[GestanteController::class, 'store'])->name('gestantes.store');
    Route::get('gestantes/{gestante}/show',[GestanteController::class, 'show'])->name('gestantes.show');
    Route::get('gestantes/{id_gestacion}/edit',[GestanteController::class, 'edit'])->name('gestantes.edit');
    Route::post('gestantes/{id_gestacion}',[GestanteController::class, 'update'])->name('gestantes.update');
    Route::delete('gestantes/{id_gestacion}',[GestanteController::class, 'destroy'])->name('gestantes.destroy');

    Route::get('vacunas', [VacunaController::class, 'index'])->name('vacunas.index');
    Route::get('vacunas/create', [VacunaController::class, 'create'])->name('vacunas.create');
    Route::post('vacunas',[VacunaController::class, 'store'])->name('vacunas.store');
    Route::get('vacunas/{gestante}/show',[VacunaController::class, 'show'])->name('vacunas.show');
    Route::get('vacunas/{id_vacuna}/edit',[VacunaController::class, 'edit'])->name('vacunas.edit');
    Route::post('vacunas/{id_vacuna}',[VacunaController::class, 'update'])->name('vacunas.update');
    Route::delete('vacunas/{id_vacuna}',[VacunaController::class, 'destroy'])->name('vacunas.destroy');

    Route::get('ventas', [VentaController::class, 'index'])->name('ventas.index');
    Route::get('ventas/create', [VentaController::class, 'create'])->name('ventas.create');
    Route::post('ventas',[VentaController::class, 'store'])->name('ventas.store');
    Route::get('ventas/{venta}/show',[VentaController::class, 'show'])->name('ventas.show');
    Route::get('ventas/{id_venta}/edit',[VentaController::class, 'edit'])->name('ventas.edit');
    Route::post('ventas/{id_venta}',[VentaController::class, 'update'])->name('ventas.update');
    Route::delete('ventas/{id_venta}',[VentaController::class, 'destroy'])->name('ventas.destroy');
});

require __DIR__.'/auth.php';
