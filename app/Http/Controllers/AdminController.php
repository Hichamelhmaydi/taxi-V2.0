<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Admin;

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
            return redirect()->route('admin.dashboard')->with('success', 'تم تسجيل الدخول بنجاح');
        }

        return back()->withErrors(['email' => 'البريد الإلكتروني أو كلمة المرور غير صحيحة.']);
    }

    public function logout() {
        Auth::guard('admin')->logout();
        return redirect()->route('admin.login')->with('success', 'تم تسجيل الخروج بنجاح.');
    }
}
