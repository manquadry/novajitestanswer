<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EncryptionController;
use App\Http\Controllers\RegistrationController;

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
    return view('welcome');
});

// Route::get('/encryption', [EncryptionController::class, 'show']);

Route::get('/encryption', [EncryptionController::class, 'showForm'])->name('encryption.form');
Route::post('/encrypt', [EncryptionController::class, 'handleEncrypt'])->name('encrypt');
Route::post('/decrypt', [EncryptionController::class, 'handleDecrypt'])->name('decrypt');



Route::get('/register', [RegistrationController::class, 'showForm'])->name('registration.form');
Route::post('/register', [RegistrationController::class, 'submitForm'])->name('registration.submit');
