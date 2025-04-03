<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home'); 
});
use App\Http\Controllers\ContactController;

Route::resource('contacts', ContactController::class);
Route::get('/contactos/create', [ContactoController::class, 'create'])->name('contactos.create');
