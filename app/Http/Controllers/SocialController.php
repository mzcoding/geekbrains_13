<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Contracts\Social;
use Laravel\Socialite\Facades\Socialite;

class SocialController extends Controller
{
    public function redirect(string $network)
	{
		return Socialite::driver($network)->redirect();
	}

	public function callback(string $network, Social $service)
	{
		return redirect( $service->loginUser(
			Socialite::driver($network)->user(), $network
		));
	}
}
