<?php

namespace Livit\Build\Controllers\Auth;

use Livit\Build\User;
use Livit\Build\Scope;
use Livit\Build\Role;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Socialite;

class AuthController extends Controller
{
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

    use AuthenticatesUsers;

    protected $redirectAfterLogout = '/login';
    protected $redirectTo = '/admin/post';

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

        if ($authUser->authorised) {
            \Auth::login($authUser, true);
            return redirect()->route('home');
        }

        return redirect()->route('unauthorised');

    }

    private function findOrCreateUser($socialUser)
    {
        if ($authUser = User::where('email', $socialUser->email)->first()) {
            return $authUser;
        }

        $authorised = 0;
        $scope = Scope::whereName('limited')->first();
        $role = Role::whereName('author')->first();

        if (isset($socialUser->user['domain']) && $socialUser->user['domain'] === 'liv.it') {
            $scope = Scope::whereName('ecosystem')->first();
            $authorised = 1;
        }

        $user = User::create([
            'name' => $socialUser->name,
            'first_name' => strtolower($socialUser->user['name']['givenName']),
            'last_name' => strtolower($socialUser->user['name']['familyName']),
            'email' => $socialUser->email,
            'authorised' => $authorised,
        ]);

        $user->attachScope($scope);
        $user->attachRole($role);

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

    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest', ['except' => 'getLogout']);
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|confirmed|min:6',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
        ]);
    }
}
