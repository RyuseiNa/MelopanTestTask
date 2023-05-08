<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\Admin;
use App\Models\SuperAdmin;
use App\Models\Merchant;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Auth\Events\Registered;
use Carbon\Carbon;

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
     * Where to redirect users after registration.
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
        $this->middleware('guest:admin');
        $this->middleware('guest:superadmin');
        $this->middleware('guest:merchant');
    }

    //Admin
    protected function adminValidator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:admins'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    public function showAdminRegisterForm()
    {
        return view('auth.register', ['authgroup' => 'admin']);
    }

    public function registerAdmin(Request $request)
    {
        $this->adminValidator($request->all())->validate();

        event(new Registered($user = $this->createAdmin($request->all())));

        Auth::guard('admin')->login($user);

        if ($response = $this->registeredAdmin($request, $user)) {
            return $response;
        }

        return $request->wantsJson()
                    ? new JsonResponse([], 201)
                    : redirect(route('home'));
    }

    protected function createAdmin(array $data)
    {
        return Admin::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            "created_at" =>  Carbon::now(),
            "updated_at" =>  Carbon::now(),
        ]);
    }

    protected function registeredAdmin(Request $request, $user)
    {
        //
    }
    //SuperAdmin
    protected function superAdminValidator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:admins'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    public function showSuperAdminRegisterForm()
    {
        return view('auth.register', ['authgroup' => 'superadmin']);
    }

    public function registerSuperAdmin(Request $request)
    {
        $this->superAdminValidator($request->all())->validate();

        event(new Registered($user = $this->createSuperAdmin($request->all())));

        Auth::guard('superadmin')->login($user);

        if ($response = $this->registeredSuperAdmin($request, $user)) {
            return $response;
        }

        return $request->wantsJson()
                    ? new JsonResponse([], 201)
                    : redirect(route('home'));
    }

    protected function createSuperAdmin(array $data)
    {
        return SuperAdmin::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            "created_at" =>  Carbon::now(),
            "updated_at" =>  Carbon::now(),
        ]);
    }

    protected function registeredSuperAdmin(Request $request, $user)
    {
        //
    }
    //Merchant
    protected function merchantValidator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:admins'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    public function showMerchantRegisterForm()
    {
        return view('auth.register', ['authgroup' => 'merchant']);
    }

    public function registerMerchant(Request $request)
    {
        $this->merchantValidator($request->all())->validate();

        event(new Registered($user = $this->createMerchant($request->all())));

        Auth::guard('merchant')->login($user);

        if ($response = $this->registeredMerchant($request, $user)) {
            return $response;
        }

        return $request->wantsJson()
                    ? new JsonResponse([], 201)
                    : redirect(route('home'));
    }

    protected function createMerchant(array $data)
    {
        return Merchant::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            "created_at" =>  Carbon::now(),
            "updated_at" =>  Carbon::now(),
        ]);
    }

    protected function registeredMerchant(Request $request, $user)
    {
        //
    }
}
