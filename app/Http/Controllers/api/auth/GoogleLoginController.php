<?php

namespace App\Http\Controllers\api\Auth;

use App\Http\Controllers\Controller;
use App\Http\Resources\User as ResourcesUser;
use App\Http\Resources\UserPublic;
use Illuminate\Http\Request;
use App\Models\User;

class GoogleLoginController extends Controller
{
    //

    public function generateToken(Request $request)
    {
        $response['status'] = false;
        $response['messegae'] = "";

        $email = $request->email;
        $user = User::where('email', $email)->first();

        if($user){
            $token = $user->createToken('myAppToken');
            return response()->json([
                'token' => $token->plainTextToken,
                'user' => new UserPublic($user)
            ]);
        }

        return response()->json($response);
    }
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->stateless()->redirect();
    }

    public function handleGoogleCallback()
    {
        $user = Socialite::driver('google')->stateless()->user();

        // Check if the user exists, and if not, create a new user in your database
        // You may customize this logic according to your application's requirements

        // Example: Check if the user already exists by email
        $existingUser = User::where('email', $user->email)->first();

        if ($existingUser) {
            // Log in the existing user
            // You may use Sanctum's token creation here
            $token = $existingUser->createToken('token-name')->plainTextToken;
            return response()->json(['token' => $token]);
        } else {
            // Create a new user and log them in
            // You may use Sanctum's token creation here
            $newUser = User::create([
                'name' => $user->name,
                'email' => $user->email,
                // Add other fields as needed
            ]);

            $token = $newUser->createToken('token-name')->plainTextToken;
            return response()->json(['token' => $token]);
        }
    }
}
