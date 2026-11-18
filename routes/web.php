<?php

use App\Http\Controllers\EventoController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CitaController;
use App\Http\Controllers\AlumnoController;
use App\Http\Controllers\HorarioController;

Route::get('/', function () {
    return redirect()->route('citas.index');
});

Route::resource('citas', CitaController::class);

Route::resource('psicologo/alumnos', AlumnoController::class);

// Ruta de recursos para gestión de horarios del psicólogo
Route::resource('psicologo/horarios', HorarioController::class);

Route::resource('alumno/eventos', EventoController::class)
    ->parameters(['eventos' => 'evento'])
    ->names('eventos');
