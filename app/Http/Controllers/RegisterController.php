<?php

namespace App\Http\Controllers;

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
        $userInput = $request->except('terms');
        $userInput['password'] = bcrypt($userInput['password']);
        User::create($userInput);
        
        $user = User::where('email', '=', $userInput['email'])->first();
        $managerInput = $request->except('password', 'confirm_password', 'terms');
        $managerInput['image'] = 'https://thebenclark.files.wordpress.com/2014/03/facebook-default-no-profile-pic.jpg';
        $managerInput['user_id'] = $user->id;
        $manager = Manager::create($managerInput);
        $user->manager_id = $manager->id;
        $user->save();

        return response()->json(['message' => 'Register successfull'], 200);
    }
}
