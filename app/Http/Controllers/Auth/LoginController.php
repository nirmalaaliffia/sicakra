<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
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

    public function authenticated(Request $request, $user)
    {
    if ($user->hasRole('admin')) {
        return redirect()->route('admin.page');
    }elseif($user->hasRole('superadmin')){
        return redirect()->route('superadmin.page');
    }elseif($user->hasRole('kecamatan')){
        return redirect()->route('kecamatan.page');
    }elseif($user->hasRole('kelurahan')){
        return redirect()->route('kelurahan.page');
    }

   return redirect()->route('user.page');
}
}
