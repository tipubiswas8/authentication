<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RetrieveController extends Controller
{
    public function retrieveCurrentUser(): View
    {
        return View('dashboard', ['currentUser' => Auth::user()]);
    }
    public function retrieveCurrentUserId(): View
    {
        return View('dashboard', ['userId' => Auth::id()]);
    }

    public function getUserViaRequest(Request $request): View
    {
        return View('dashboard', ['requestUser' => $request->user()]);
    }

    public function getStudentViaRequest(Request $request): View
    {
        // $user = $request->user('student');
        // $user = Auth::guard('student')->user();
        // $user = auth()->guard('student')->user();
        $requestStudent = $request->user('student');
        return View('dashboard2', ['requestStudent' => $requestStudent]);
    }

}
