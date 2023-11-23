<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class TestController extends Controller
{
    public function index(Request $request){

        //Log::info($request->all());
// Log::info($data['userId']['space']);
        $data =  $request->all();
        Log::info($data['userId']['user']);
        Log::info($data['userId']['user']['email']);

        // $user = new User();
        // $user->name = $data['userId']['user']['displayName'];
        // $user->email = $data['userId']['user']['email'];
        // $user->avatar = $data['userId']['user']['avatarUrl'];
        // $user->email_verified_at = now();
        // $user->spaces = $data['userId']['space']['name'];
        // $user->user_id_chat = $data['userId']['user']['name'];
        // $user->save();


        User::updateOrCreate([
            'email' => $data['userId']['user']['email']
        ],[
            "name" => $data['userId']['user']['displayName'],
            "email" => $data['userId']['user']['email'],
            "avatar" => $data['userId']['user']['avatarUrl'],
            "email_verified_at" => now(),
            "spaces" => $data['userId']['space']['name'],
            "user_id_chat" => $data['userId']['user']['name'],
        ]);
       
        return 'test';
    }
}
