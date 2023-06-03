<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class SocialController extends Controller
{
    //Facebook
    public function facebookRedirect()
    {
        return Socialite::driver('facebook')->redirect();
    }

    public function loginWithFacebook()
    {
        try {
    
            $user = Socialite::driver('facebook')->user();
            $isUser = User::where('fb_id', $user->id)->first();
     
            if ($isUser) {
                Auth::login($isUser);
                $isUser->createToken('AccessToken')->accessToken;
                return redirect('/dashboard');
            } else {
                $createUser = User::create([
                    'name' => $user->name,
                    'email' => $user->email,
                    'fb_id' => $user->id,
                ]);
    
                Auth::login($createUser);
                $createUser->createToken('AccessToken')->accessToken;
                return redirect('/dashboard');
            }
    
        } catch (Exception $exception) {
            dd($exception->getMessage());
        }
    }

    //Twitter
    public function twitterRedirect()
    {
        return Socialite::driver('twitter')->redirect();
    }

    public function loginWithTwitter()
    {
        try {
    
            $user = Socialite::driver('twitter')->user();
            $isUser = User::where('twitter_id', $user->id)->first();

            if ($isUser) {
                Auth::login($isUser);
                $isUser->createToken('AccessToken')->accessToken;
                return redirect('/dashboard');
            } else {
                $createUser = User::create([
                    'name' => $user->name,
                    'email' => $user->email,
                    'twitter_id' => $user->id,
                ]);
    
                Auth::login($createUser);
                $createUser->createToken('AccessToken')->accessToken;
                return redirect('/dashboard');
            }
    
        } catch (Exception $exception) {
            dd($exception->getMessage());
        }
    }
}