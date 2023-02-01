<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\LoginFormRequest;
use App\Http\Requests\RegisterFormRequest;
use App\Models\Survey;
use App\Models\User;
use Illuminate\Auth\Authenticatable;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use  Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserController extends Controller
{
    use RegistersUsers;
    public function login(LoginFormRequest $request)
    {
        return view('auth.login');
    }

    public function register(RegisterFormRequest $request)
    {

        $user = User::create($request->only('name', 'email', 'password'));

        auth()->login($user);


    }
}
