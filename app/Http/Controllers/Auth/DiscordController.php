<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Socialite;
use Auth;
use Exception;
use App\User as User;

class DiscordController extends Controller
{

    use AuthenticatesUsers;

    /**
     * Redirect the user to the GitHub authentication page.
     *
     * @return Response
     */
    public function redirectToProvider()
    {
        return Socialite::with('discord')->redirect();
    }

    /**
     * Obtain the user information from GitHub.
     *
     * @return Response
     */
    public function handleProviderCallback()
    {
        try {
            $user = Socialite::driver('discord')->user();
        } catch (Exception $e) {
            return redirect('auth/discord');
        }

        $authUser = $this->findOrCreateUser($user);

        Auth::login($authUser, true);

        return redirect()->route('home');
    }

    private function findOrCreateUser($discordUser)
    {
        $authUser = User::where('discord_id', $discordUser->id)->first();

        if ($authUser){
            return $authUser;
        }

        return User::create([
            'name' => $discordUser->name,
            'email' => $discordUser->email,
            'discord_id' => $discordUser->id
        ]);
    }
}
