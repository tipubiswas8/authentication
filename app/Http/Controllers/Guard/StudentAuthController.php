<?php

namespace App\Http\Controllers\Guard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StudentAuthController extends Controller
{
    public function showLoginForm()
    {
        return view('guard.student-login');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');
        Auth::guard('student')->attempt($credentials);
        return redirect()->intended('/student/dashboard');
    }

    public function logout()
    {
        Auth::guard('student')->logout();
        return redirect('/student/login');
    }
}
