<?php

namespace App\Http\Controllers\Guard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Student;
use Exception;

class StudentRegistrationController extends Controller
{
    public function index()
    {
        return view('guard.student-registration');
    }

    public function registration(Request $request)
    {
        try {
            $student = new Student;
            $student->name = $request->name;
            $student->email = $request->email;
            $student->phone = $request->phone;
            $student->password = $request->password;
            $student->save();
            echo 'Student Registration Successfully';
        } catch (Exception $e) {
            dd($e);
        }
    }
}
