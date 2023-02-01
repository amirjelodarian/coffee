<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginFormRequest;
use App\Http\Requests\RegisterFormRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class UserController extends Controller
{
    public function register(RegisterFormRequest $request)
    {
        $user = User::create($request->only('name', 'email', 'password'));
        if($user){
            auth()->login($user);
            return response()->json(true);
        }
        return response()->json(false);
    }
    public function login(LoginFormRequest $request)
    {
        $userStatus = auth()->attempt($request->only('email','password'));
        if($userStatus){
            auth()->login(User::whereEmail($request->email)->first());
            return response()->json(true);
        }
        return response()->json(false);

    }
    public function logout()
    {
        auth()->logout();
        return redirect()->route('home');
    }
}
