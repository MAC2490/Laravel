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
        return Inertia::render('Estudiantes/consultar',[
            'estudiante' => Estudiantes::all()
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

        Estudiantes::create($request->all());
        return response()->json(['status'=>true]);
    }   

    /**
     * Display the specified resource.
     */
    public function show(Estudiantes $estudiante)
    {

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Estudiantes $estudiante)
    {
        return $estudiante;
        // return response()->json(['status'=>$estudiante]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Estudiantes $estudiante)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Estudiantes $estudiante)
    {
        //
    }
}
