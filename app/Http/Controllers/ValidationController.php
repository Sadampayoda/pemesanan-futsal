<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\UsersRequest;
use App\Models\User;
use App\Repostiories\CrudRepositories;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ValidationController extends Controller
{
    protected $crud;

    public function __construct()
    {
        $this->crud = new CrudRepositories(User::class);
    }
    public function login()
    {
        return view('content.guest.validate.login');
    }
    public function register()
    {
        return view('content.guest.validate.register');
    }

    public function loginValidate(LoginRequest $loginRequest)
    {
        $credentials = $loginRequest->only(['email', 'password']);

        if (Auth::attempt($credentials)) {
            $loginRequest->session()->regenerate();

            return redirect()->intended('dashboard');
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');
    }

    public function registerValidate(UsersRequest $usersRequest)
    {
        $data = $usersRequest->only(['name','email','password','level']);
        $this->crud->create($data);
        return redirect()->route('login')->with('success', 'Akun anda berhasil dibuat');
    }
}
