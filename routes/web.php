<?php

use Illuminate\Support\Facades\Route;

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
    return view('welcome');
});

Route::get('/registration', [App\Http\Controllers\RegistrationController::class, 'index'])->name('registration.index');
Route::post('/registration/next', [App\Http\Controllers\RegistrationController::class, 'create'])->name('registration.create');

// Route::resource('registration', App\Http\Controllers\RegistrationController::class);
// Route::resource('admin', RegistrationController::class);

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
