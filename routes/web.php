<?php

use App\Http\Controllers\EventoController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CitaController;
use App\Http\Controllers\AlumnoController;
use App\Http\Controllers\HorarioController;
use App\Http\Controllers\HerramientaController;
Route::get('/', function () {
    return redirect()->route('citas.index');
});

Route::resource('citas', CitaController::class);

Route::resource('psicologo/alumnos', AlumnoController::class);

// Ruta de recursos para gestión de horarios del psicólogo
Route::resource('psicologo/horarios', HorarioController::class)
    ->names('psicologo.horarios');


Route::resource('alumno/eventos', EventoController::class)
    ->parameters(['eventos' => 'evento'])
    ->names('eventos');
Route::resource('alumno/herramientas', HerramientaController::class)
    ->parameters(['herramientas' => 'herramienta'])
    ->names('herramientas');