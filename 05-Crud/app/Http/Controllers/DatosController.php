<?php

namespace App\Http\Controllers;

use App\Models\Datos;
use Illuminate\Http\Request;
use Inertia\Inertia;

class DatosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Inertia::render('Datos/consultar', [
            'datos'=>Datos::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return Inertia::render('Datos/registrar');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {   
        $request->validate([
            'nombre' => 'required',
            'apellido' => 'required',
            'documento' => 'required|unique:datos',
            'email' => 'unique:datos|email'
        ]);


        Datos::create($request->all());
        return response()->json(['status'=>true]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Datos $datos)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Datos $dato)
    {
        return $dato;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Datos $datos)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Datos $datos)
    {
        //
    }
}
