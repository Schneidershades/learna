<?php

namespace App\Http\Controllers\Api\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\UserRegistrationFormRequest;
use App\Http\Requests\User\UserLoginFormRequest;
use App\Http\Requests\User\UserUpdateFormRequest;

class UserController extends Controller
{
    public function register(UserRegistrationFormRequest $request)
    {
        $input = $request->all();
        $user = User::create($input);
        $user->save();

        Auth::attempt($request->only(['email', 'password']));

        return $this->authSuccessResponse($request->user(), $token);
    }

    public function login(UserLoginFormRequest $request)
    {
        if(!$token = Auth::attempt($request->only(['email', 'password']))){
            return $this->authErrorResponse('Could not sign you in with those details', 401);
        }

        return $this->authSuccessResponse($request->user(), $token);
    }

    public function update(UserUpdateFormRequest $request, $id){
        $user = User::find(auth()->user()->id);
        
        $user->save();
    }

    public function logout()
    {
        auth()->logout();
    }

    public function profile(){
        $user = auth()->user();
        return $this->showMessage($user, 201);
    }

}

