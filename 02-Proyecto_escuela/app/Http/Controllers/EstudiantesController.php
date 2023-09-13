<?php

namespace App\Http\Controllers;

use App\Models\Estudiantes;
use Illuminate\Http\Request;
use Inertia\Inertia;

class EstudiantesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $datos = Estudiantes::all();
        return Inertia::render('Estudiantes/listar', [
            'datos' => $datos,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return Inertia::render('Estudiantes/index');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required',
            'apellido' => 'required',
            'documento' => 'required'
        ]);
 
        $datos = Estudiantes::create($request->all());
        return redirect()->route('Estudiantes.listar');
    }

    /**
     * Display the specified resource.
     */
    public function show(Estudiantes $estudiantes)
    {
        $datos = Estudiantes::all();
        return Inertia::render('Estudiantes/editar', [
            'datos' => $datos,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Estudiantes $estudiantes)
    {
        $datos = $estudiantes;
        return Inertia::render('Estudiantes/editar', compact('datos'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Estudiantes $estudiantes)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Estudiantes $estudiantes)
    {
        //
    }
}
