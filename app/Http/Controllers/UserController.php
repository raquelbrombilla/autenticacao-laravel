<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Cookie;

class UserController extends Controller
{
    protected $view_name;

    public function __construct() {
        $this->users = new User();
    }

    public function auth(Request $request)
    {

        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ],[
            'email.required' => 'O email é obrigatório',
            'password.required' => 'A senha é obrigatória'
        ]);

        if($request->has('remember')){
            Cookie::queue('email', $request->email, 1440);
            Cookie::queue('password', $request->password, 1440);
        }

        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            // $user = auth()->user();
            return redirect()->intended('welcome');
        }

        return back()->withErrors([
            'email' => 'Usuário ou senha inválido',
        ]);
    }

    public function cadastrar(Request $request){

        $query = User::where('email', $request->email)->get();

        if(count($query) > 0){
            return redirect()->back()->with('msg_erro',"Esse email já está cadastrado.");
        } else {
            $insert = User::create([
                'email' => $request->email,
                'password' => Hash::make($request->password)
            ]);

            if($insert){
                return redirect()->route('login')->with('msg_success',"Cadastro concluído!");
            }
        }
    }

    public function logout (Request $request) {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('login');
    }

}
