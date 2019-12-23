<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\RegisterRequest;
use App\Manager;
use App\User;

class RegisterController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest');
    }

    public function store(RegisterRequest $request)
    {
        $userInput = $request->all();
        $userInput['password'] = bcrypt($userInput['password']);
        $managerInput = $request->except('password', 'confirm_password');
        $managerInput['image'] = 'https://thebenclark.files.wordpress.com/2014/03/facebook-default-no-profile-pic.jpg';

        User::create($userInput);
        Manager::create($managerInput);

        return response()->json(['message' => 'Register successfull'], 200);
    }
}
