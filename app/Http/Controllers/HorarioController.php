<?php

namespace App\Http\Controllers;

use App\Models\Horario;
use App\Http\Requests\StoreHorarioRequest;
use App\Http\Requests\UpdateHorarioRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class HorarioController extends Controller
{
    // Muestra todos los horarios con paginación
    public function index(): View
    {
        $horarios = Horario::latest()->paginate(10);
        return view('psicologo.horarios.index', compact('horarios'));
    }

    // Muestra el formulario para crear un horario nuevo
    public function create(): View
    {
        return view('psicologo.horarios.create');
    }

    // Guarda el nuevo horario validado en la base de datos
    public function store(StoreHorarioRequest $request): RedirectResponse
    {
        Horario::create($request->validated());
        return redirect()->route('psicologo.horarios.index')
            ->with('success', 'Horario guardado correctamente.');
    }

    // Muestra un horario específico (no usado en este CRUD)
    public function show(Horario $horario): View
    {
        return view('psicologo.horarios.show', compact('horario'));
    }

    // Muestra el formulario para editar un horario existente
    public function edit(Horario $horario): View
    {
        return view('psicologo.horarios.edit', compact('horario'));
    }

    // Actualiza los datos del horario validado
    public function update(UpdateHorarioRequest $request, Horario $horario): RedirectResponse
    {
        $horario->update($request->validated());
        return redirect()->route('psicologo.horarios.index')
            ->with('success', 'Horario actualizado correctamente.');
    }

    // Elimina un horario de la base de datos
    public function destroy(Horario $horario): RedirectResponse
    {
        $horario->delete();
        return redirect()->route('psicologo.horarios.index')
            ->with('success', 'Horario eliminado correctamente.');
    }
}
