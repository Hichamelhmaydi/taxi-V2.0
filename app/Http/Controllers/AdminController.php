<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Admin;
use App\Models\User;
use App\Models\Reservation;

class AdminController extends Controller {
    public function showLoginForm() {
        return view('admin.login');
    }
    public function login(Request $request) {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::guard('admin')->attempt($request->only('email', 'password'))) {
            return redirect()->route('admin.dashboard')->with('success', 'ok');
        }

        return back()->withErrors(['email' => 'mots de pass pas valide']);
    }
    public function logout() {
        Auth::guard('admin')->logout();
        return redirect()->route('admin.login')->with('success', 'déconnecté avec succès'); 
    }
    public function deleteUser($id){
        $user = User::findOrFail($id);
        $user->delete(); 
        return redirect()->route('admin.dashboard')->with('success', 'Utilisateur supprimé avec succès');
    }   
    public function dashboard(){
        $usersCount = User::whereNotNull('id')->count();  
        $reservationsCount = Reservation::whereNotNull('id')->count();  
        $users = User::all();
        $reservations = Reservation::join('users', 'reservations.passager_id', '=', 'users.id')
        ->select('reservations.*', 'users.name as passager_name')
        ->get();
    
        return view('admin.dashboard', compact('users', 'usersCount', 'reservationsCount', 'reservations'));
    }
}
