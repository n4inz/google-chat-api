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
        Log::info($data['user']['user']);
        Log::info($data['user']['user']['email']);

        // $user = new User();
        // $user->name = $data['userId']['user']['displayName'];
        // $user->email = $data['userId']['user']['email'];
        // $user->avatar = $data['userId']['user']['avatarUrl'];
        // $user->email_verified_at = now();
        // $user->spaces = $data['userId']['space']['name'];
        // $user->user_id_chat = $data['userId']['user']['name'];
        // $user->save();


        User::updateOrCreate([
            'email' => $data['user']['user']['email']
        ],[
            "name" => $data['user']['user']['displayName'],
            "email" => $data['user']['user']['email'],
            "avatar" => $data['user']['user']['avatarUrl'],
            "email_verified_at" => now(),
            "spaces" => $data['user']['space']['name'],
            "user_id_chat" => $data['user']['user']['name'],
        ]);
       
        return 'test';
    }
}
