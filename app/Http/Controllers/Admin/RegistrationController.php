<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;

class RegistrationController extends Controller
{
    public function index()
    {
        return view('registration');
    }

    public function registration(Request $request)
    {
        try {
            $user = new User;
            $user->name = $request->name;
            $user->username = $request->username;
            $user->email = $request->email;
            $user->phone = $request->phone;
            $user->password = $request->password;
            $user->save();
            echo 'User Registration Successfully';
        } catch (Exception $e) {
            dd($e);
        }
    }

    public function registerAndLoginWithUser()
    {
        return view('registration-and-login-with-user');
    }

    public function registrationAndLoginWithUser(Request $request)
    {
        try {
            $user = new User;
            $user->name = $request->name;
            $user->username = $request->username;
            $user->email = $request->email;
            $user->phone = $request->phone;
            $user->password = $request->password;
            $user->save();
            // $newUser = User::find($user->id);
            // Auth::login($newUser);
            Auth::login($user);
            return redirect()->intended('dashboard');
        } catch (Exception $e) {
            dd($e);
        }
    }

    public function registerAndLoginWithUserId()
    {
        return view('registration-and-login-with-user-id');
    }

    public function registrationAndLoginWithUserId(Request $request)
    {
        try {
            $user = new User;
            $user->name = $request->name;
            $user->username = $request->username;
            $user->email = $request->email;
            $user->phone = $request->phone;
            $user->password = $request->password;
            $user->save();
            Auth::loginUsingId($user->id);
            return redirect()->intended('dashboard');
        } catch (Exception $e) {
            dd($e);
        }
    }
}
