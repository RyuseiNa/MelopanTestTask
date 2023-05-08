<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{

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
        $this->middleware('guest:admin')->except('logout');
        $this->middleware('guest:superadmin')->except('logout');
        $this->middleware('guest:merchant')->except('logout');
    }
    //Admin
    public function showAdminLoginForm()
    {
        return view('auth.login', ['authgroup' => 'admin']);
    }

    public function adminLogin(Request $request)
    {
        $this->validate($request, [
            'email'   => 'required|email',
            'password' => 'required|min:8'
        ]);

        if (method_exists($this, 'hasTooManyLoginAttempts') &&
            $this->hasTooManyLoginAttempts($request)) {
            $this->fireLockoutEvent($request);

            return $this->sendLockoutResponse($request);
        }

        if (Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password])) {
            return redirect(route('dashboard'));
        }
        // If the login attempt was unsuccessful we will increment the number of attempts
        // to login and redirect the user back to the login form. Of course, when this
        // user surpasses their maximum number of attempts they will get locked out.
        $this->incrementLoginAttempts($request);

        return back()->withInput($request->only('email', 'remember'));
    }
    //SuperAdmin
    public function showSuperAdminLoginForm()
    {
        return view('auth.login', ['authgroup' => 'superadmin']);
    }

    public function superAdminLogin(Request $request)
    {
        $this->validate($request, [
            'email'   => 'required|email',
            'password' => 'required|min:8'
        ]);

        if (method_exists($this, 'hasTooManyLoginAttempts') &&
            $this->hasTooManyLoginAttempts($request)) {
            $this->fireLockoutEvent($request);

            return $this->sendLockoutResponse($request);
        }

        if (Auth::guard('superadmin')->attempt(['email' => $request->email, 'password' => $request->password])) {
            return redirect(route('dashboard'));
        }
        // If the login attempt was unsuccessful we will increment the number of attempts
        // to login and redirect the user back to the login form. Of course, when this
        // user surpasses their maximum number of attempts they will get locked out.
        $this->incrementLoginAttempts($request);

        return back()->withInput($request->only('email', 'remember'));
    }
    //Merchant
    public function showMerchantLoginForm()
    {
        return view('auth.login', ['authgroup' => 'merchant']);
    }

    public function merchantLogin(Request $request)
    {
        $this->validate($request, [
            'email'   => 'required|email',
            'password' => 'required|min:8'
        ]);

        if (method_exists($this, 'hasTooManyLoginAttempts') &&
            $this->hasTooManyLoginAttempts($request)) {
            $this->fireLockoutEvent($request);

            return $this->sendLockoutResponse($request);
        }

        if (Auth::guard('merchant')->attempt(['email' => $request->email, 'password' => $request->password])) {
            return redirect(route('dashboard'));
        }
        // If the login attempt was unsuccessful we will increment the number of attempts
        // to login and redirect the user back to the login form. Of course, when this
        // user surpasses their maximum number of attempts they will get locked out.
        $this->incrementLoginAttempts($request);

        return back()->withInput($request->only('email', 'remember'));
    }
    //All
    public function logout(Request $request)
    {
        $toRedirect;
        if(Auth::guard('superadmin')->check()){
            $toRedirect="superadamin";
        }else if(Auth::guard('admin')->check()){
            $toRedirect="admin";
        }else if(Auth::guard('merchant')->check()){
            $toRedirect="merchant";
        }
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/'.$toRedirect.'/login');
    }
}
