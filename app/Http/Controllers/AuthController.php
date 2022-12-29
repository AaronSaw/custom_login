<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Contracts\Services\Auth\AuthServiceInterface;
use App\Http\Requests\ChangePasswordRequest;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;

/**
 * This is auth Controller.
 */
class AuthController extends Controller
{
    /**
     * auth interface
     */
    private $authInterface;

    /**
     * Create a new controller instance
     *
     * @return void
     */
    public function __construct(AuthServiceInterface $authServiceInterface)
    {
        $this->authInterface = $authServiceInterface;
    }

    /**
     * To login
     * @return View login page
     */
    public function login()
    {
        return view('auth.login');
    }

    /**
     * To register
     * @return View register page
     */
    public function register()
    {
        return view('auth.register');
    }

    /**
     * To store input data
     * @return Redirect register page with success message
     */
    public function store(RegisterRequest $request)
    {
        //return $request;
        $this->authInterface->storePost($request);
        return redirect()->route('auth.login')->with(['registerSuccess' => 'Registration Successful']);
    }

    /**
     * To create input data
     * @return Redirect home page
     */
    public function create(LoginRequest $request)
    {
        //return $request;
        $input = $this->authInterface->createPost($request);
        if ($input) {
            error_log('login user role is');
            error_log(Auth::user()->role);
            if (Auth::user()->role == 0) {
                return redirect()->route('admin.dashboard');
            } else if (Auth::user()->role == 1) {
                return redirect()->route('dashboard');
            }
        } else {
            return back()->with('error', 'Your email and password are incorrect!');
        }
    }

    /**
     * To logout
     * @return Redirect login page
     */
    public function logout()
    {
        $this->authInterface->logoutPost();
        return redirect()->route('auth.login');
    }

    /**
     * To changePassword
     * @return view
     */
    public function changePassword()
    {
        return view('admin.changePassword');
    }

    /**
     * To updatePassword
     * @param request
     * @return Rediect
     */
    public function updatePassword(ChangePasswordRequest $request)
    {
        $this->authInterface->updatePasswordPost($request);
        return redirect()->route('change.password')->with('success_message', 'Password change successfully.');
    }
}
