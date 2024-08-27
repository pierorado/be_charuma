<?php

use App\Http\Controllers\UserController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AnimalController;
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


});

require __DIR__.'/auth.php';
