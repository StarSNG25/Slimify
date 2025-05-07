<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class GoogleController extends Controller
{
	public function redirect()
	{
		return Socialite::driver('google')->redirect();
	}
	
	public function handleCallback()
	{
		if ($error = request('error'))
			return redirect()->route('login')->with('error', $error);
		
		$googleUser = Socialite::driver('google')->user();
		
		$user = User::updateOrCreate(
			['email' => $googleUser->getEmail()],
			[
				'name' => $googleUser->getName(),
				'provider' => 'google',
				'provider_id' => $googleUser->getId(),
				'avatar' => $googleUser->getAvatar(),
			]
		);
		
		Auth::login($user);
		
		return redirect()->intended(route('dashboard', absolute: false));
	}
}
