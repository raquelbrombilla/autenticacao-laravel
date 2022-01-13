<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class FaceBookController extends Controller
{
    public function loginFacebook(){
        return Socialite::driver('facebook')->redirect();
    }

    public function callbackFacebook(){
       
        try {
            $user = Socialite::driver('facebook')->stateless()->user();

            $find = User::where('facebook_id', $user->id)->first();
            
            if($find){
      
                Auth::login($find);
                return redirect('/welcome');
      
            }else{
                $newUser = User::create([
                    'email' => $user->email,
                    'facebook_id'=> $user->id,
                ]);
     
                Auth::login($newUser);
                return redirect('/welcome');

            }
        } catch (\Throwable $th) {
            throw $th;
        }
    }
}
