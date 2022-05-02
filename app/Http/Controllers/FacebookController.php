<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Str;

class FacebookController extends Controller
{
    //
    public function login()
    {
        return Socialite::driver('facebook')->redirect();
    }

    public function callback()
    {
        try{

            $facebook_user = Socialite::driver('facebook')->stateless()->user();
            $user = User::where('email', $facebook_user->email)->first();
            if ($user){
                Auth::login($user);
                $accessToken = Auth::user()->createToken('authToken')->accessToken;
                return response(['user'=> Auth::user(), 'access_token' => $accessToken]);
            } else {
                $new_user = User::create([
                    'name' => ucwords($facebook_user->name),
                    'email' => $facebook_user->email,
                    'email_verified_at' => now(),
                    'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
                    'remember_token' => Str::random(10),
                ]);

                Auth::login($new_user);
                $accessToken = Auth::user()->createToken('authToken')->accessToken;
                return response(['user'=> Auth::user(), 'access_token' => $accessToken]);
            }

        } catch(\Throwable $th){
            echo '<pre>';
            echo $th;
            echo '</pre>';
            abort(404);
        }
    }
}
