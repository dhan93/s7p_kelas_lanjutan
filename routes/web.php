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

// Route::get('/', function () {
//     return view('welcome');
// })->name('welcome');

Route::get('/', [App\Http\Controllers\RegistrationController::class, 'index'])->name('welcome');
Route::get('/registration', [App\Http\Controllers\RegistrationController::class, 'index'])->name('registration.index');
Route::post('/registration/next', [App\Http\Controllers\RegistrationController::class, 'create'])->name('registration.create');
Route::patch('/registration/update/{id}', [App\Http\Controllers\RegistrationController::class, 'update'])->name('registration.update');
Route::get('/confirmation', [App\Http\Controllers\RegistrationController::class, 'confirmationIndex'])->name('confirmation.index');
Route::post('/confirmation/update', [App\Http\Controllers\RegistrationController::class, 'confirmationUpdate'])->name('confirmation.update');
Route::get('/status', [App\Http\Controllers\RegistrationController::class, 'status'])->name('status');

// Route::resource('registration', App\Http\Controllers\RegistrationController::class);
// Route::resource('admin', RegistrationController::class);

Route::middleware(['auth'])->get('/dashboard', [App\Http\Controllers\Admin\RegistrationController::class, 'index'])->name('dashboard');

Route::name('admin.')->prefix('admin')->middleware(['auth'])->group(function () {
  Route::get('/dashboard', [App\Http\Controllers\Admin\RegistrationController::class, 'index'])->name('dashboard');
  Route::get('/user/{id}', [App\Http\Controllers\Admin\RegistrationController::class, 'showUser'])->name('user.show');
  Route::post('/user/update/status', [App\Http\Controllers\Admin\RegistrationController::class, 'statusUpdate'])->name('user.update.status');
  Route::post('/user/update/resent', [App\Http\Controllers\Admin\RegistrationController::class, 'messageResent'])->name('message.resent');
});

require __DIR__.'/auth.php';
