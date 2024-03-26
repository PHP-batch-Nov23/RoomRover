<?php

namespace App\Http\Controllers;

use App\Models\User;

use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\Validator;
use Symfony\Component\HttpFoundation\Response;
use Tymon\JWTAuth\Facades\JWTAuth;

use Illuminate\Http\Request;

class RegisterAgentController extends Controller
{
    public function register(Request $request)
    {
        //validations
        $validator = Validator::make($request->all(), [
            'full_name' => 'required|min:3|max:255',
            'email' => 'required|email|unique:users,email',
            'contact' => 'required',
            'password' => 'required|min:5'
        ]);

        if ($validator->fails()) {
            $response = [
                'success' => false,
                'message' => $validator->errors()
            ];
            return response()->json($response, 400);
        }

        $inputs = $request->all();
        $inputs['password'] = bcrypt($inputs['password']);
        $user = User::create($inputs);
        if ($user) {
            return response()->json([
                'Success' => true,
                'code' => 200,
                'message' => 'User Register Successfully',
                'data' => $user

            ], Response::HTTP_OK);
        }
    }

    public function login(Request $request)
    {
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            $user = Auth::user();
            // Check if user is approved
            if ($user->is_approved == 1) {
                $success['name'] = $user->name;
                $token = JWTAuth::fromUser($user);
                $response = [
                    'success' => true,
                    'message' => 'User login successful',
                    'token' => $token,
                    'data' => $success
                ];
                return response()->json($response, 200);
            } else {
                // User is not approved
                $response = [
                    'success' => false,
                    'message' => 'Unauthorized user. User not approved.',
                ];
                return response()->json($response);
            }
        } else {
            // Authentication failed
            $response = [
                'success' => false,
                'message' => 'Unauthorized user. Invalid credentials.',
            ];
            return response()->json($response);
        }
    }
}
