<?php

namespace App\Http\Controllers\Auth;

use App\User;
use Illuminate\Support\Facades\Redirect;
use Laravel\Socialite\Facades\Socialite;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

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

    use AuthenticatesUsers, ThrottlesLogins;

    protected $redirectAfterLogout = '/auth/login';
    protected $redirectTo = '/admin/post';

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
            'email' => 'email|max:255',
            'password' => 'confirmed|min:6',
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


    /**
     * Trello Stuff
     * @return mixed
     */
    public function redirectToProvider()
    {
        return Socialite::driver('trello')->redirect();
    }
    public function handleProviderCallback()
    {
        try {
            $user = Socialite::driver('trello')->user();
        } catch (Exception $e) {
            return Redirect::to('auth/trello');
        }

        $authUser = $this->findOrCreateUser($user);

        \Auth::login($authUser, true);

        return Redirect::to('admin');
    }
    private function findOrCreateUser($trelloUser)
    {
        $userInfo = $trelloUser->user;

        if ($authUser = User::where('trello_id',$userInfo['id'])->first()) {
            return $authUser;
        }

        return User::create([
            'name' => $userInfo['username'],
            'trello_id' => $userInfo['id'],
        ]);
    }
}
