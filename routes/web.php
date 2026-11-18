<?php
use App\Http\Controllers\EventoController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CitaController;
use App\Http\Controllers\AlumnoController;

Route::get('/', function () {
    return redirect()->route('citas.index');
});

Route::resource('citas', CitaController::class);


Route::resource('psicologo/alumnos', AlumnoController::class);
Route::resource('alumno/eventos', EventoController::class)
    ->parameters(['eventos' => 'evento'])
    ->names('eventos');