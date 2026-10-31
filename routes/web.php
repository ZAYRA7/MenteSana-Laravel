<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CitaController;

// Redirigir la raíz a la lista de citas
Route::get('/', function () {
    return redirect()->route('citas.index');
});

// Rutas del CRUD
Route::resource('citas', CitaController::class);