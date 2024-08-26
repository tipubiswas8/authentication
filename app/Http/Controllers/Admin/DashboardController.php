<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        if (Auth::check()) {
            // return view('dashboard');
            return View('dashboard');
        }
        return redirect('/login-with-remember');
    }

    public function dashboard2()
    {
        return view('dashboard2');
    }
}
