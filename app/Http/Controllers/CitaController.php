<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CitaController extends Controller
{
    // Arreglo estático que simula la base de datos
    private static $citas = [
        ['id' => 1, 'paciente' => 'Ana García', 'fecha' => '2026-11-05', 'hora' => '10:00 AM', 'psicologo' => 'Ps. María Gómez', 'estado' => 'Confirmada'],
        ['id' => 2, 'paciente' => 'Luis Pérez', 'fecha' => '2026-11-06', 'hora' => '11:30 AM', 'psicologo' => 'Dr. Carlos Mendoza', 'estado' => 'Pendiente'],
        ['id' => 3, 'paciente' => 'Carlos Ruiz', 'fecha' => '2026-11-07', 'hora' => '04:00 PM', 'psicologo' => 'Ps. María Gómez', 'estado' => 'Cancelada'],
    ];

    public function index()
    {
        return view('citas.index', ['citas' => self::$citas]);
    }

    public function create()
    {
        return view('citas.create');
    }

    public function store(Request $request)
    {
        return redirect()->route('citas.index')->with('success', 'Cita agendada correctamente (Simulado).');
    }

    public function edit($id)
    {
        $cita = collect(self::$citas)->firstWhere('id', $id);
        return view('citas.edit', ['cita' => $cita]);
    }

    public function update(Request $request, $id)
    {
        return redirect()->route('citas.index')->with('success', 'Cita actualizada correctamente (Simulado).');
    }

    public function destroy($id)
    {
        return redirect()->route('citas.index')->with('success', 'Cita cancelada correctamente (Simulado).');
    }
}