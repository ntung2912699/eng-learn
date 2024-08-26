<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;
use Laravel\Socialite\Facades\Socialite;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    protected $user;

    public function __construct(User $user)
    {
        $this->middleware('guest')->except('logout');
        $this->middleware('auth')->only('logout');
        $this->user = $user;
    }

    public function redirectToFacebook()
    {
        return Socialite::driver('facebook')->redirect();
    }

    public function handleFacebookCallback()
    {
        try {
            $facebookUser = Socialite::driver('facebook')->stateless()->user();
            $findUser = User::where('email', $facebookUser->email)->first();
            if ($findUser) {
                Auth::login($findUser);
                $token = Auth::user()->createToken('auth_token')->plainTextToken;
                Session::put('jwt_token', $token);
                return redirect($this->redirectTo);
            } else {
                $newUser = User::create([
                    'facebook_id' => $facebookUser->getId(),
                    'name' => $facebookUser->getName(),
                    'email' => $facebookUser->getEmail(),
                    'avatar' => $facebookUser->getAvatar(),
                    'facebook_token' => $facebookUser->token,
                    'facebook_refresh_token' => $facebookUser->refreshToken,
                    'password' => bcrypt(Str::random(16))
                ]);

                Auth::login($newUser);
                $token = Auth::user()->createToken('auth_token')->plainTextToken;
                Session::put('jwt_token', $token);
                return redirect($this->redirectTo);
            }
        } catch (\Exception $e) {
            return redirect('/login')->with('error', 'Có lỗi xảy ra trong quá trình đăng nhập bằng Facebook');
        }
    }

    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    public function handleGoogleCallback()
    {
        try {
            $user = Socialite::driver('google')->stateless()->user();
            $findUser = User::where('email', $user->email)->first();

            if ($findUser) {
                Auth::login($findUser);
                $token = Auth::user()->createToken('auth_token')->plainTextToken;
                Session::put('jwt_token', $token);
                return redirect($this->redirectTo);
            } else {
                $newUser = User::create([
                    'name' => $user->name,
                    'email' => $user->email,
                    'google_id' => $user->id,
                    'password' => bcrypt(Str::random(16))
                ]);

                Auth::login($newUser);
                $token = Auth::user()->createToken('auth_token')->plainTextToken;
                Session::put('jwt_token', $token);
                return redirect($this->redirectTo);
            }

        } catch (\Exception $e) {
            return redirect('/login')->with('error', 'Có lỗi xảy ra trong quá trình đăng nhập bằng Google');
        }
    }
}
