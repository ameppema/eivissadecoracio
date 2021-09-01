<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Carbon;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
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
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    protected function loggedOut(Request $request){
        return redirect()->route('home', 'es');
    }
    /**
     * Update automatically last LogIn
     */
    function authenticated(Request $request, $user){
        $user->update([
            'last_login_at' => Carbon::now()->toDateTimeString()
        ]);
    }
    /**
     * Deny LogIn if user account is inactive
     */
    protected function validateLogin(Request $request){
        $user = User::where($this->username(), '=', $request->input($this->username()))->first();
        if ($user && ! $user->status) {
            throw ValidationException::withMessages([$this->username() => __('The account is inactive')]);
        }
        $request->validate([
            $this->username() => 'required|string',
            'password' => 'required|string',
        ]);
    }
}
