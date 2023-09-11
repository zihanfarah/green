<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Exception;
use Illuminate\Support\Carbon;

class TwitterController extends Controller
{
    public function redirectToTwitter() {
        return Socialite::driver('twitter')->redirect();
        }

    
    public function handleTwitterCallback() {
        try {
            $user = Socialite::driver('twitter')->user();
            $finduser = User::where('twitter_id', $user->id)->first();
       
            if($finduser) {
                Auth::login($finduser);
                return redirect('/home');
            }
            
            else {
                $newUser = User::create([
                'name' => $user->name,
                'email' => $user->nickname,
                'email_verified_at' => Carbon::now(),
                'twitter_id'=> $user->id,
                'password' => encrypt('123456dummy')
            ]);
            
        Auth::login($newUser);
        return redirect('/home');
        }

        } catch (Exception $e) {
        return redirect('login')->with('error','Mohon maaf, kami sedang memperbaiki
       aplikasi agar sesuai dengan kebijakan Twitter');
        }
    }
}
