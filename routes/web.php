<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CitaController;

Route::get('/', function () {
    return redirect()->route('citas.index');
});

Route::resource('citas', CitaController::class);