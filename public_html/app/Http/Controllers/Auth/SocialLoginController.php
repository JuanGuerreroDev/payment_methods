<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;
use App\Models\User;
use App\Models\SocialProfile;

class SocialLoginController extends Controller
{

    public function login($provider){
        $drivers =
            [
                'facebook',
                'google',
            ];
        if (in_array($provider, $drivers)){
            return Socialite::driver($provider)->redirect();
        }else{
            return redirect()->route('login')->with('message', ucfirst($provider).' no es una aplicación valida para poder iniciar sesión');
        }
    }

    public function callback($provider){
        $userSocial = Socialite::driver($provider)->user();
        $user = User::where('email', $userSocial->getName())->first();
        if (!$user){
            $user = User::create([
                'name' => $userSocial->getName(),
                'email' => $userSocial->getEmail(),
            ]);
        }
        $socialProfile = SocialProfile::where('social_id', $userSocial->getId())
                                        ->where('social_name', $provider)->first();
        if (!$socialProfile){
            SocialProfile::create([
                'user_id' => $user->id,
                'social_id' => $userSocial->getId(),
                'social_name' => $provider,
                'social_avatar' => $userSocial->getAvatar(),
            ]);
        }
        Auth::login($user);
        return redirect()->route('dashboard');
    }
}
