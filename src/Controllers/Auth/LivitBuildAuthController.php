<?php

namespace Livit\Build\Controllers\Auth;

use App\User;
use Livit\Build\Scope;
use Livit\Build\Role;
use Socialite;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;

trait LivitBuildAuthController
{
    use AuthenticatesAndRegistersUsers, ThrottlesLogins;
    /*
    |--------------------------------------------------------------------------
    | Registration & Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users, as well as the
    | authentication of existing users. By default, this controller uses
    | a simple trait to add these behaviors. Why don't you explore it?
    |
    */

    public function redirectToProvider($provider)
    {
        return Socialite::driver($provider)->redirect();
    }

    public function handleProviderCallback($provider)
    {
        try {
            $user = Socialite::driver($provider)->user();
        } catch (Exception $e) {
            return redirect()->route('social/' . $provider);
        }

        $authUser = $this->findOrCreateUser($user);

        \Auth::login($authUser, true);
        return redirect()->route('home');

    }

    private function findOrCreateUser($socialUser)
    {
        if ($authUser = User::where('email', $socialUser->email)->first()) {
            return $authUser;
        }

        $user = User::create([
            'name' => $socialUser->name,
            'first_name' => strtolower($socialUser->user['name']['givenName']),
            'last_name' => strtolower($socialUser->user['name']['familyName']),
            'email' => $socialUser->email,
        ]);

        return $user;
    }

    /**
     * Show the application login form.
     *
     * @return \Illuminate\Http\Response
     */
    public function getLogin()
    {
        if (view()->exists('build::auth.authenticate')) {
            return view('build::auth.authenticate');
        }

        return view('build::auth.login');
    }
}
