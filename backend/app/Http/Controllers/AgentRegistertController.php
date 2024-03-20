<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use Auth;
use App\Models\User;

class AgentRegistertController extends Controller
{
    public function register(Request $request){
        //validations
        $validator = Validator::make($request->all(), [
            'full_name' => 'required|min:3|max:255', // Minimum and maximum length for full name
            'email' => 'required|email|unique:users,email', // Unique email validation
            'contact' => 'required|regex:/^\d+$/', // Validate contact as numbers only
            'password' => 'required|min:8', // Minimum length and confirmation for password
          ]);

          if($validator->fails()){
            $response=[
                'success'=>false,
                'message'=>$validator->errors()
            ];
            return response()->json($response, 400);
          }

          $inputs=$request->all();
          $inputs['password']=bcrypt( $inputs['password']);
          $user=User::create($inputs);

          $success['token']=$user->createToken('MyApp')->plainTextToken;
          $success['name']=$user->name;
          $response=[
            'success'=>true,
            'message'=>'user registered successfully',
            'data'=>$success
          ];

          return response()->json($response, 200);
          
    }

    public function login(Request $request){
        if(Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            $user = Auth::user();
            
            // Check if user is approved
            if ($user->is_approved == 1) {
                $success['token'] = $user->createToken('MyApp')->plainTextToken;
                $success['name'] = $user->name;
                $response = [
                    'success' => true,
                    'message' => 'User login successful',
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
