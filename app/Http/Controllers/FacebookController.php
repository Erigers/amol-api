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

}
