<?php

namespace App\Http\Controllers;

use App\Models\Cita;
use App\Http\Requests\StoreCitaRequest;
use App\Http\Requests\UpdateCitaRequest;

class CitaController extends Controller
{
    public function index()
    {
        $citas = Cita::paginate(10);
        return view('citas.index', compact('citas'));
    }

    public function create()
    {
        return view('citas.create');
    }

    public function store(StoreCitaRequest $request)
    {
        Cita::create($request->validated());
        return redirect()->route('citas.index')->with('success', 'Cita creada exitosamente.');
    }

    public function edit(Cita $cita)
    {
        return view('citas.edit', compact('cita'));
    }

    public function update(UpdateCitaRequest $request, Cita $cita)
    {
        $cita->update($request->validated());
        return redirect()->route('citas.index')->with('success', 'Cita actualizada exitosamente.');
    }

    public function destroy(Cita $cita)
    {
        $cita->delete();
        return redirect()->route('citas.index')->with('success', 'Cita eliminada exitosamente.');
    }
}