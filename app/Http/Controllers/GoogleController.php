<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class GoogleController extends Controller
{
    public function loginGoogle(){
        return Socialite::driver('google')->redirect();
    }

    public function callbackGoogle(){
        try {
            $user = Socialite::driver('google')->user();
            $find = User::where('google_id', $user->id)->first();
      
            if($find){
      
                Auth::login($find);
                return redirect('/welcome');
      
            }else{
                
                $newUser = User::create([
                    'email' => $user->email,
                    'google_id'=> $user->id,
                ]);
     
                Auth::login($newUser);
                
                return redirect('/welcome');
            }

        } catch (\Throwable $th) {
            throw $th;
        }
    }
}
