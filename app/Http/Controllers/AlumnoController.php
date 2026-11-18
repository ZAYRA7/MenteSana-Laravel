<?php

namespace App\Http\Controllers;

use App\Models\Alumno;
use Illuminate\Http\Request;
use App\Http\Requests\StoreAlumnoRequest;
use App\Http\Requests\UpdateAlumnoRequest;

class AlumnoController extends Controller
{
    public function index()
    {
        $alumnos = Alumno::latest()->paginate(10);
        return view('psicologo.alumnos.index', compact('alumnos'));
    }

    public function create()
    {
        return view('psicologo.alumnos.create');
    }

    public function store(StoreAlumnoRequest $request)
    {
        Alumno::create($request->validated());

        return redirect()->route('alumnos.index')
            ->with('success', 'Alumno registrado exitosamente.');
    }

    public function show(Alumno $alumno)
    {
        return view('psicologo.alumnos.show', compact('alumno'));
    }

    public function edit(Alumno $alumno)
    {
        return view('psicologo.alumnos.edit', compact('alumno'));
    }

    public function update(UpdateAlumnoRequest $request, Alumno $alumno)
    {
        $alumno->update($request->validated());

        return redirect()->route('alumnos.index')
            ->with('success', 'Alumno actualizado correctamente.');
    }

    public function destroy(Alumno $alumno)
    {
        $alumno->delete();

        return redirect()->route('alumnos.index')
            ->with('success', 'Alumno eliminado correctamente.');
    }
}
