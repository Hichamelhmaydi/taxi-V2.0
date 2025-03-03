<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function updateStatus(Request $request)
    {
        $user = Auth::user();
        $user->disponibilite = !$user->disponibilite; 
        $user->save();
        return response()->json(['success' => true, 'status' => $user->disponibilite]);
    }
}
