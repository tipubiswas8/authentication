<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\LoginController;
use App\Http\Controllers\Admin\RegistrationController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\AuthDashboardController;
use App\Http\Controllers\Admin\AuthLogoutController;
use App\Http\Controllers\Guard\StudentAuthController;
use App\Http\Controllers\Guard\StudentRegistrationController;
use App\Http\Controllers\Guard\StudentDashboardController;

Route::get('/', function () {
    return view('welcome');
});

// auth dashboard with middleware
Route::get('/auth-login', [LoginController::class, 'authIndex'])->name('auth.login');
Route::post('/auth-login', [LoginController::class, 'authLogin']);
Route::get('/auth-dashboard', [AuthDashboardController::class, 'index'])->middleware('auth');
Route::post('/auth-logout', [AuthLogoutController::class, 'index']);

Route::get('/register', [RegistrationController::class, 'index'])->name('register');
Route::post('/register', [RegistrationController::class, 'registration']);
Route::get('/register-and-login-with-user', [RegistrationController::class, 'registerAndLoginWithUser']);
Route::post('/register-and-login-with-user', [RegistrationController::class, 'registrationAndLoginWithUser']);
Route::get('/register-and-login-with-user-id', [RegistrationController::class, 'registerAndLoginWithUserId']);
Route::post('/register-and-login-with-user-id', [RegistrationController::class, 'registrationAndLoginWithUserId']);

// login
Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
// login with remember
Route::get('/login-with-remember', [LoginController::class, 'loginWithRemember'])->name('login.with.remember');
Route::post('/login-with-remember', [LoginController::class, 'loginWithRememberPost']);
// dashboard
Route::get('/dashboard', [DashboardController::class, 'index']);
// retrieve user
Route::get('/retrieve-user', '\App\Http\Controllers\Admin\RetrieveController@retrieveCurrentUser');
Route::get('/retrieve-user-id', '\App\Http\Controllers\Admin\RetrieveController@retrieveCurrentUserId');
Route::get('/get-user-via-request', '\App\Http\Controllers\Admin\RetrieveController@getUserViaRequest');
// logout
Route::post('/logout', '\App\Http\Controllers\Admin\LogoutController@index');
// login with user
Route::get('/login-with-user', [LoginController::class, 'indexWithUser'])->name('login.with.user');
Route::post('/login-with-user', [LoginController::class, 'indexWithUserPost']);
// login with id
Route::get('/login-with-id', [LoginController::class, 'indexWithId']);
Route::post('/login-with-id', [LoginController::class, 'indexWithIdPost']);
// retrieve student
Route::get('/get-student-via-request', '\App\Http\Controllers\Admin\RetrieveController@getStudentViaRequest');
// login with email or username or phone
Route::get('/login-with-email-username-phone', [LoginController::class, 'indexWithEmailUsernamePhone']);
Route::post('/login-with-email-username-phone', [LoginController::class, 'indexWithEmailUsernamePhonePost']);
// dashboard2
Route::get('/dashboard2', [DashboardController::class, 'dashboard2']);
// logout
Route::post('/logout2', '\App\Http\Controllers\Admin\LogoutController@logout');
// using guard
Route::prefix('student')->group(function () {
    Route::get('/register', [StudentRegistrationController::class, 'index'])->name('student.register');
    Route::post('/register', [StudentRegistrationController::class, 'registration']);
    Route::get('/login', [StudentAuthController::class, 'showLoginForm'])->name('student.login');
    Route::post('/login', [StudentAuthController::class, 'login'])->name('student.login.post');

    // middleware('auth:student'): Uses the default auth middleware with the student guard.
    Route::middleware('auth:student')->group(function () {
        Route::get('/dashboard', [StudentDashboardController::class, 'index'])->name('student.dashboard');
    });

    // // middleware('student'): Refers to a custom middleware registered with the name student
    // Route::middleware('student')->group(function () {
    //     Route::get('/dashboard', [StudentDashboardController::class, 'index'])->name('student.dashboard');
    // });

    Route::post('/logout', [StudentAuthController::class, 'logout'])->name('student.logout');
});





/*
difference between middleware('auth:student') and middleware('auth.student')
-----------------------------------------------------------------------------

1. middleware('auth:student')
Syntax: This is used when you are specifying a guard directly within the auth middleware.

Meaning: It means you are using the auth middleware with the student guard. The colon (:) separates the middleware name (auth) from the guard name (student).

Example Usage: This is commonly used when you have multiple guards configured in your auth.php configuration file, and you want to specify which guard should be used for authentication.


2. middleware('auth.student')
Syntax: This represents a custom middleware that has been registered with the name auth.student.

Meaning: It refers to a specific middleware registered in your application, which might perform authentication logic specific to students. The period (.) is just part of the name and does not have any special meaning in this context.


Summary
middleware('auth:student'): Uses the default auth middleware with the student guard.
middleware('auth.student'): Refers to a custom middleware registered with the name auth.student.

*/
