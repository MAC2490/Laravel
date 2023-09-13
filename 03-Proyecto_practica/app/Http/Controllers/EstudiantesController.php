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
    public function index(Request $request)
    {
        return Inertia::render('Estudiantes/consultar', [
            'datos' => Estudiantes::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return Inertia::render('Estudiantes/registrar');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required',
            'apellido' => 'required',
            'documento' => 'required|unique:estudiantes'
        ]);

        $registro = Estudiantes::create($request->all());
        return Inertia::render('Estudiantes/consultar', [
            'datos' => Estudiantes::all()
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Estudiantes $estudiantes)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Estudiantes $estudiante)
    {
        return Inertia::render('Estudiantes/editar', ['estudiante'=>$estudiante]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Estudiantes $estudiante)
    {
        $request->validate([
            'nombre' => 'required',
            'apellido' => 'required'
        ]);

        $proceso = $estudiante->update($request->all());
        return response()->json(['status'=>$proceso]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Estudiantes $estudiante)
    {
        $estudiante->delete();
        return response()->json(['status'=>true]);
    }
}
