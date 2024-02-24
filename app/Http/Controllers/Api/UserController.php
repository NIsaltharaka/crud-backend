<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserStoreRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Models\User;



class UserController extends Controller
{
    /**
     * create user
     * @param Request $request
     * @return User 
     */
    public function createuser(UserStoreRequest $request){

        $validator = Validator::make($request->all(), [
            'name' => 'required|string',
            'email' => 'required|email|unique:users', 
            'password' => 'required|string',
        ]);

        // Check for validation failure
        if ($validator->fails()) {
            return response()->json(['message' => 'Validation error', 'errors' => $validator->errors()], 400);
        }

        try {
            // Save the user data to the database
            $user = User::create($validator->validated());

            return response()->json(['message' => 'User registered successfully', 'user' => $user], 201);
        } catch (\Exception $e) {
            // Handle the error scenario
            return response()->json(['message' => 'Error saving user data', 'error' => $e->getMessage()], 500);
        }
    }

    /**
     * login user
     * @param Request $request
     * @return User 
     */
    public function loginuser(UserStoreRequest $request){
        try {
            $validateUser = Validator::make($request->all(), [
                'email' => 'required|email',
                'password' => 'required'
            ]);

            if($validateUser->fails()){
                return response()->json([
                    'status' => false,
                    'message' => 'validation error',
                    'errors' => $validateUser->errors()
                ], 401);
            }

            if(!Auth::attempt($request->only(['email','password']))){
                return response()->json([
                    'status' => false,
                    'message' => 'Email And Password Does Not Match',
                ], 401);
            }

            $user = User::where('email',$request->email)->first();

            return response()->json([
                'status' => true,
                'message' => 'Logged In Successfull',
                'token' => $user->createToken("API TOKEN")->plainTextToken
            ], 200);
        } catch (\Throwable $th) {
            return response()->json([
                'status' => false,
                'message' => $th->getMessage()
            ], 500);
        }
    }

   
}
