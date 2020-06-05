<?php

namespace App\Http\Controllers\Api\User;

use App\Models\User;
use App\Http\Controllers\Api\ApiController;
use App\Http\Requests\User\UserRegistrationFormRequest;
use App\Http\Requests\User\UserLoginFormRequest;
use App\Http\Requests\User\UserUpdateFormRequest;
use Auth;

class UserController extends ApiController
{
    public function register(UserRegistrationFormRequest $request)
    {
        $requestColumns = array_keys($request->all());

        $user = new User;

        $tableColumns = $this->getColumns($user->getTable());

        $fields = array_intersect($requestColumns, $tableColumns);

        foreach($fields as $field){
            $user->setAttribute($field, $request[$field]);
        }

        $user->save();

        if(!$token = auth()->attempt($request->only(['email', 'password']))){
            return $this->errorResponse('unauthenticated', 401);
        }

        return $this->respondWithToken($token);
    }

    public function login(UserLoginFormRequest $request)
    {
        if(!$token = Auth::attempt($request->only(['email', 'password']))){
            return $this->authErrorResponse('Could not sign you in with those details', 401);
        }

        return $this->respondWithToken($token);
    }

    public function update(UserUpdateFormRequest $request, $id){
        $user = User::find(auth()->user()->id);

        $tableColumns = $this->getColumns($user->getTable());

        $fields = array_intersect($requestColumns, $tableColumns);

        foreach($fields as $field){
            $user->setAttribute($field, $request[$field]);
        }
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

