<?php

namespace App\Http\Controllers\Auth;

use App\User;
use Socialite;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

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
    protected function redirectTo()
    {
        return url()->previous();
    }


    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
    /**
     * Redirect To Google authentication API
     * @return Illuminate\Http\Response
     */
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }
    /**
     * Handle the callback from google
     * @param  Request $request [description]
     * @return [Illuminate\Http\Response]  
     */
    public function handleGoogleCallback(Request $request)
    {
        $user = Socialite::driver('google')->stateless()->user();

        $this->loginOrCreate($user, $request);

        return redirect()->intended();
    }

    /**
     * Log in the user or create a new one
     * @param  [Object]  $providedUser [User information from Oauth2 provider]
     * @param  Illuminate\Http\Request $request      
     * @return void
     */
    public function loginOrCreate($providedUser, Request $request)
    {
        $user = User::where('email', $providedUser->getEmail())->first();

        if(!$user){
            $user = User::create([
                'email' => $providedUser->getEmail(),
                'name' => $providedUser->getName()
            ]);
        }

        auth()->login($user);
        $this->authenticated($request, $user);
        //flash()->success('Welcome','You are now loged in');        
    }

    /**
     * When authenticated increse number of logins
     * @param  Illuminate\Http\Request $request 
     * @param  [App\User]  $user    
     * @return void
     */
    public function authenticated(Request $request, $user)
    {
        if(isset($user->numberOfLogins)){
            $user->numberOfLogins++;
            $user->save();
        }
    }


    public function logout(Request $request)
    {
        auth()->logout();

        $request->session()->invalidate();



        return redirect()->back();
    }

}
