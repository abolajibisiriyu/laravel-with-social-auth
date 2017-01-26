<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\SocialProvider;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\RegistersUsers;

use Illuminate\Http\Request;

use Auth;

use Socialite;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after login / registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
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
            'password' => 'required|min:6|confirmed',
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

    public function redirectToProvider($provider)
    {
        return Socialite::driver($provider)->redirect();
    }

    public function handleProviderCallback(Request $request, $provider)
    {
        try // for if the user rejects authentication
        {
            $socialUser = Socialite::driver($provider)->user();
        }catch(\Exception $e){
            $request->session()->flash('status', $provider.' authentication was denied');
            return redirect('login'); // return to login page with status
        }

        // check for existing entry in social provider table
        $socialProvider = SocialProvider::where('provider_id', $socialUser->getId())->first();

        if(!$socialProvider){ // create new user and social provider
            $user = User::firstOrCreate(
                ['email' => $socialUser->getEmail()],
                ['name' => $socialUser->getName(), 'password' => bcrypt(str_random(16))] // create random password, because password field is not nullable
            );

            $user->socialProviders()->create([
                'provider' => $provider,
                'provider_id' => $socialUser->getId()
            ]);
        }else{
            $user = $socialProvider->user; // return existing user
        }

        // log user in
        Auth::login($user);

        return redirect($this->redirectTo);
        
    }
}
