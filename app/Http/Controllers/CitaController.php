<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CitaController extends Controller
{
    // Función para obtener las citas (inicializa la sesión si está vacía)
    private function obtenerCitas()
    {
        if (!session()->has('citas_db')) {
            session(['citas_db' => [
                ['id' => 1, 'paciente' => 'Ana García', 'fecha' => '2026-11-05', 'hora' => '10:00 AM', 'psicologo' => 'Ps. María Gómez', 'estado' => 'Confirmada'],
                ['id' => 2, 'paciente' => 'Luis Pérez', 'fecha' => '2026-11-06', 'hora' => '11:30 AM', 'psicologo' => 'Dr. Carlos Mendoza', 'estado' => 'Pendiente'],
                ['id' => 3, 'paciente' => 'Carlos Ruiz', 'fecha' => '2026-11-07', 'hora' => '04:00 PM', 'psicologo' => 'Ps. María Gómez', 'estado' => 'Cancelada'],
            ]]);
        }
        return session('citas_db');
    }

    public function index()
    {
        $citas = $this->obtenerCitas();
        return view('citas.index', compact('citas'));
    }

    public function create()
    {
        return view('citas.create');
    }

    public function store(Request $request)
    {
        $citas = $this->obtenerCitas();
        
        // Generar un ID nuevo
        $nuevoId = count($citas) > 0 ? max(array_column($citas, 'id')) + 1 : 1;

        // Agregar la nueva cita al arreglo
        $citas[] = [
            'id' => $nuevoId,
            'paciente' => $request->paciente,
            'fecha' => $request->fecha,
            'hora' => $request->hora,
            'psicologo' => $request->psicologo,
            'estado' => 'Pendiente'
        ];

        session(['citas_db' => $citas]);
        return redirect()->route('citas.index')->with('success', 'Cita agendada correctamente.');
    }

    public function edit($id)
    {
        $citas = $this->obtenerCitas();
        $cita = collect($citas)->firstWhere('id', $id);
        return view('citas.edit', compact('cita'));
    }

    public function update(Request $request, $id)
    {
        $citas = $this->obtenerCitas();
        
        foreach ($citas as &$cita) {
            if ($cita['id'] == $id) {
                $cita['paciente'] = $request->paciente;
                $cita['fecha'] = $request->fecha;
                $cita['hora'] = $request->hora;
                $cita['psicologo'] = $request->psicologo;
            }
        }

        session(['citas_db' => $citas]);
        return redirect()->route('citas.index')->with('success', 'Cita actualizada correctamente.');
    }

    public function destroy($id)
    {
        $citas = $this->obtenerCitas();
        
        // Filtrar para eliminar la cita
        $citas = array_values(array_filter($citas, function($cita) use ($id) {
            return $cita['id'] != $id;
        }));

        session(['citas_db' => $citas]);
        return redirect()->route('citas.index')->with('success', 'Cita cancelada correctamente.');
    }
}