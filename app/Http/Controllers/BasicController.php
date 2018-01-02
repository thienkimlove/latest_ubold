<?php

namespace App\Http\Controllers;

use Log;
use Sentinel;
use Exception;
use Socialite;

class BasicController extends Controller
{

    public function notice()
    {
        return view('notice');
    }

    public function redirectToSSO()
    {
        return Socialite::driver('google')->redirect();
    }


    public function handleSSOCallback()
    {
        try {
            $googleUser = Socialite::driver('google')->user();
            $user = Sentinel::findByCredentials(['login' => $googleUser->email]);
            if ($user) {
                Sentinel::login($user, true);
                session()->put('google_token', $googleUser->token);
                return redirect()->intended('/admin');
            } else {
                @file_get_contents('https://accounts.google.com/o/oauth2/revoke?token='. $googleUser->token);
                return redirect()->route('notice');
            }
        } catch (Exception $e) {
            Log::info($e->getMessage());
            return redirect('notice');
        }
    }


    public function logout()
    {
        Sentinel::logout();

        @file_get_contents('https://accounts.google.com/o/oauth2/revoke?token='.session()->get('google_token'));
        session()->forget('google_token');

        return redirect()->route('notice');
    }

    public function index()
    {
        return view('index');
    }

    /**
     * Using for admin ajax if needed
     * @return \Illuminate\Http\JsonResponse
     */
    public function ajax()
    {
        $status = false;
        return response()->json(['status' => $status]);
    }

}