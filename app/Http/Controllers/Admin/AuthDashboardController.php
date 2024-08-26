<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

class AuthDashboardController extends Controller
{
    public function index()
    {
        return View('auth-dashboard');
    }
}
