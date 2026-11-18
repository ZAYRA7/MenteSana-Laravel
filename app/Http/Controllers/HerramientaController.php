<?php

namespace App\Http\Controllers;

use App\Http\Requests\HerramientaRequest;
use App\Models\Herramienta;

class HerramientaController extends Controller
{
    /**
     * Listado con paginación.
     */
    public function index()
    {
        $herramientas = Herramienta::latest()->paginate(10);

        return view('herramientas.index', compact('herramientas'));
    }

    /**
     * Formulario de creación.
     */
    public function create()
    {
        return view('herramientas.create');
    }

    /**
     * Guardar una nueva herramienta.
     */
    public function store(HerramientaRequest $request)
    {
        Herramienta::create($request->validated());

        return redirect()->route('herramientas.index')
            ->with('success', 'Herramienta creada correctamente.');
    }

    /**
     * Mostrar una herramienta (redirige a editar).
     */
    public function show(Herramienta $herramienta)
    {
        return redirect()->route('herramientas.edit', $herramienta);
    }

    /**
     * Formulario de edición.
     */
    public function edit(Herramienta $herramienta)
    {
        return view('herramientas.edit', compact('herramienta'));
    }

    /**
     * Actualizar una herramienta.
     */
    public function update(HerramientaRequest $request, Herramienta $herramienta)
    {
        $herramienta->update($request->validated());

        return redirect()->route('herramientas.index')
            ->with('success', 'Herramienta actualizada correctamente.');
    }

    /**
     * Eliminar una herramienta.
     */
    public function destroy(Herramienta $herramienta)
    {
        $herramienta->delete();

        return redirect()->route('herramientas.index')
            ->with('success', 'Herramienta eliminada correctamente.');
    }
}