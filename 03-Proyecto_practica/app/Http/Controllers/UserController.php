<?php

namespace App\Http\Controllers;

use App\Models\User;
use Inertia\Inertia;
use App\Models\Estudiantes;

class UserController extends Controller
{
    public function index()
    {
        return Inertia::render('Users/Index', [
            'datos' => Estudiantes::all()
        ]);
    }
}
