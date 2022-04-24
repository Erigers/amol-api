<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Str;

class GithubController extends Controller
{
    //
    public function login()
    {
        return Socialite::driver('github')->redirect();
    }

    public function callback()
    {
        try{

            $google_user = Socialite::driver('github')->stateless()->user();
            $user = User::where('email', $google_user->email)->first();
            if ($user){
                Auth::login($user);
                return view('user',[ 'user' => $user]);
            } else {
                $new_user = User::create([
                    'name' => ucwords($google_user->name),
                    'email' => $google_user->email,
                    'email_verified_at' => now(),
                    'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
                    'remember_token' => Str::random(10),
                ]);

                Auth::login($new_user);
                return view('user', ['user' => $new_user]);
            }

        } catch(\Throwable $th){
            echo '<pre>';
            echo $th;
            echo '</pre>';
            abort(404);
        }
    }
    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }
}
