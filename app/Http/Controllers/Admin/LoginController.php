<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Student;

class LoginController extends Controller
{
    public function authIndex(): View
    {
        return View('auth-login');
    }

    public function authLogin(Request $request)
    {
        $credentials = [
            'username' => $request->input('username'),
            'password' => $request->input('password')
        ];

        Auth::attempt($credentials);
        return redirect()->intended('auth-dashboard');
    }

    public function index(): View
    {
        return View('login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required', 'min:6'],
        ]);

        if (Auth::attempt($credentials)) {
            if (Auth::check()) {
                $session = $request->session()->regenerate();
                return redirect()->intended('dashboard');
                // return RedirectResponse::intended('dashboard');
            } else {
                return redirect('/login');
            }
        }
        return redirect('/login');
    }


    /*
    if check remember me user never logout until manually logout.
    if don't check remember me user automatically logout when you close browser 
    or after 120 minuets later.
    you can set the value for automatic logout time or browser close behavior at
    config/session.php file
    'lifetime' => env('SESSION_LIFETIME', 120),
    'expire_on_close' => env('SESSION_EXPIRE_ON_CLOSE', false),
    */

    public function loginWithRemember(): View
    {
        return View('login-with-remember');
    }

    public function loginWithRememberPost(Request $request)
    {
        $remember = $request->remember;
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required', 'min:6'],
        ]);

        // if (Auth::viaRemember()) {
        //     // ...
        // }

        if (Auth::attempt($credentials, $remember)) {
            if (Auth::check()) {
                $session = $request->session()->regenerate();
                return redirect()->intended('dashboard');
                // return RedirectResponse::intended('dashboard');
            } else {
                return redirect('/login-with-remember');
            }
        }
        return redirect('/login-with-remember');
    }


    public function indexWithUser(): View
    {
        return View('login-with-user');
    }

    public function indexWithUserPost(Request $request)
    {
        $form_data = $request->form_data;
        $user = Student::where('id', $form_data)
            ->orWhere('name', $form_data)
            ->orWhere('email', $form_data)
            ->orWhere('phone', $form_data)
            ->first();
        if ($user) {
            Auth::guard('student')->login($user);
            if (Auth::guard('student')->check()) {
                $session = $request->session()->regenerate();
                return redirect()->intended('dashboard2');
            } else {
                return redirect('/login-with-user');
            }
        } else {
            return redirect('/login-with-user');
        }
    }

    public function indexWithId(): View
    {
        return View('login-with-id');
    }

    public function indexWithIdPost(Request $request)
    {
        $id = $request->id;
        if ($id) {
            // $student = Student::find($id);
            // $id = $student->id;
            Auth::guard('student')->loginUsingId($id);
            if (Auth::guard('student')->check()) {
                $session = $request->session()->regenerate();
                return view('dashboard2', ['request' => $request]);
            } else {
                return redirect('/login-with-id');
            }
        } else {
            return redirect('/login-with-id');
        }
    }

    public function indexWithEmailUsernamePhone(): View
    {
        return View('login-with-email-username-phone');
    }

    public function indexWithEmailUsernamePhonePost(Request $request)
    {
        $studentData = $request->name;
        $password = $request->password;
        $studentInfo = Student::where('id', $studentData)
            ->orWhere('name', $studentData)
            ->orWhere('email', $studentData)
            ->orWhere('phone', $studentData)
            ->first();

        if ($studentData) {
            if (
                Auth::guard('student')->attempt(['id' => $studentInfo, 'password' => $password]) ||
                Auth::guard('student')->attempt(['name' => $studentInfo, 'password' => $password]) ||
                Auth::guard('student')->attempt(['email' => $studentInfo, 'password' => $password]) ||
                Auth::guard('student')->attempt(['phone' => $studentInfo, 'password' => $password])
            ) {
                if (Auth::guard('student')->check()) {
                    $session = $request->session()->regenerate();
                    return redirect()->intended('dashboard2');
                }
                return redirect('/login-with-email-username-phone');
            }
            return redirect('/login-with-email-username-phone');
        }
        return redirect('/login-with-email-username-phone');
    }
}
