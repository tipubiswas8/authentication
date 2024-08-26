<?php

namespace App\Http\Controllers\Guard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StudentDashboardController extends Controller
{
    public function index()
    {
        if (Auth::guard('student')->check()) {
            return view('guard.student-dashboard');
        }
    }
}
