<?php

use App\Http\Controllers\UserController;
use App\Http\Controllers\FaceBookController;
use App\Http\Controllers\GoogleController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Request\Validate;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Str;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/welcome', function () {
    return view('welcome');
})->middleware('auth');


Route::get('/login', function () {
    return view('login');
})->name('login');

Route::get('/cadastro', function () {
    return view('cadastro');
});

Route::get('/forgot-password', function () {
    return view('email');
})->middleware('guest')->name('forgot-password');


Route::post('/forgot-password', function (Request $request) {
    $request->validate(['email' => 'required|email']);

    $status = Password::sendResetLink(
        $request->only('email')
    );

    return $status === Password::RESET_LINK_SENT
                ? back()->with(['status' => __($status)])
                : back()->withErrors(['email' => __($status)]);
})->middleware('guest')->name('password-email');

Route::get('/reset-password/{token}', function ($token) {
    return view('reset', ['token' => $token]);
})->middleware('guest')->name('password.reset');

Route::post('/reset-password', function (Request $request) {

    $request->validate([
        'token' => 'required',
        'email' => 'required|email',
        'password' => 'required|confirmed',
        'password_confirmation' => 'required',
    ]);
    
    $status = Password::reset(
        $request->only('email', 'password', 'password_confirmation', 'token'),
        function ($user, $password) {
            $user->forceFill([
                'password' => Hash::make($password)
            ])->setRememberToken(Str::random(60));

            $user->save();

            event(new PasswordReset($user));
        }
    );

    return $status === Password::PASSWORD_RESET
                ? redirect()->route('login')->with('status', __($status))
                : back()->withErrors(['email' => [__($status)]]);
})->middleware('guest')->name('password-update');


Route::post('/auth', [UserController::class, 'auth'])->name('auth');
Route::post('cadastrar', [UserController::class, 'cadastrar'])->name('cadastrar');
Route::get('/logout', [UserController::class, 'logout'])->name('logout');

Route::prefix('facebook')->name('facebook.')->group( function(){
    Route::get('auth', [FaceBookController::class, 'loginFacebook'])->name('login');
    Route::get('callback', [FaceBookController::class, 'callbackFacebook'])->name('callback');
});

Route::prefix('google')->name('google.')->group( function(){
    Route::get('auth', [GoogleController::class, 'loginGoogle'])->name('login');
    Route::get('callback', [GoogleController::class, 'callbackGoogle'])->name('callback');
});

