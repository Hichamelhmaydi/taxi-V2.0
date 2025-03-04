<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class HomeController extends Controller
{
    public function index()
    {
        $chauffeurs = User::where('role', 'chauffeur')->where('disponibilite', true)->get();

        return view('welcome', compact('chauffeurs'));
    }
}

