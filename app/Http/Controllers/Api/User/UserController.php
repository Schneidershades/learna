<?php

namespace App\Http\Controllers\Api\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function register(Request $request)
    {
        $this->validate($request, [
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8',
        ]);

        // validation is in the exception handler
        $input = $request->all();
        $user = User::create($input);
        $user->save();
        
        $token = JWTAuth::attempt($request->only('email', 'password'));

        return $this->authSuccessResponse($request->user(), $token);
    }

    public function login(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|string|email',
            'password' => 'required|string',
        ]);

        if(!$token = JWTAuth::attempt($request->only('email', 'password'))){
            return $this->authErrorResponse('Could not sign you in with those details', 401);
        }

        return $this->authSuccessResponse($request->user(), $token);
    }

    public function update(Request $request, $id){
        $user = User::find(auth()->user()->id);

        if($request->title){
            $user->title = $request->title;
        }

        if($request->first_name){
            $user->first_name = $request->first_name;
        }

        if($request->middle_name){
            $user->middle_name = $request->middle_name;
        }

        if($request->last_name){
            $user->last_name = $request->last_name;
        }

        if($request->gender){
            $user->gender = $request->gender;
        }

        if($request->primary_role){
            $user->primary_role = $request->primary_role;
        }

        if($request->department){
            $user->department = $request->department;
        }

        if($request->job_title){
            $user->job_title = $request->job_title;
        }

        if($request->location_address_house_number){
            $user->location_address_house_number = $request->location_address_house_number;
        }

        if($request->location_address_street_name){
            $user->location_address_street_name = $request->location_address_street_name;
        }

        if($request->location_address_suburb){
            $user->location_address_suburb = $request->location_address_suburb;
        }

        if($request->location_address_city){
            $user->location_address_city = $request->location_address_city;
        }

        if($request->location_address_state){
            $user->location_address_state = $request->location_address_state;
        }

        if($request->gps_location_name){
            $user->gps_location_name = $request->gps_location_name;
        }

        if($request->gps_long){
            $user->gps_long = $request->gps_long;
        }

        if($request->gps_lat){
            $user->gps_lat = $request->gps_lat;
        }

        if($request->gps_city){
            $user->gps_city = $request->gps_city;
        }

        if($request->gps_state){
            $user->gps_state = $request->gps_state;
        }

        if($request->bank_name){
            $user->bank_name = $request->bank_name;
        }

        if($request->bank_account_name){
            $user->bank_account_name = $request->bank_account_name;
        }

        if($request->bank_account_number){
            $user->bank_account_number = $request->bank_account_number;
        }

        if($request->gps_city){
            $user->gps_city = $request->gps_city;
        }

        if($request->gps_state){
            $user->gps_state = $request->gps_state;
        }

        if($request->bank_name){
            $user->bank_name = $request->bank_name;
        }

        if($request->bank_account_name){
            $user->bank_account_name = $request->bank_account_name;
        }

        if($request->bank_account_number){
            $user->bank_account_number = $request->bank_account_number;
        }

        $user->save();
    }

    public function logout()
    {
        auth()->logout();
        return response()->json([
            'code'   => $this->successStatus,
            'status' => true,
            'message'=> "Logout Success",
            'data'   => []
        ], $this->successStatus);
    }

    public function profile(){
        $user = auth()->user()->with('userable')->get();
        $user = [
            'user' => auth()->user(),
            'user_type' => auth()->user()->userable()
        ];
        return $this->showMessage($user, 201);
    }

}

