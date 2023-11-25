<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Resources\Task;
use App\Models\Category;
use App\Models\Tasks;
use App\Models\User;
use Dflydev\DotAccessData\Data;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class CreateTask extends Controller
{
    
    public function index(Request $request)
    {
        $data =  $request->all();
        $user = User::where('email' , $data['user']['user']['email'] ?? 0)->first('id');

        

        if($user){
            Tasks::updateOrCreate([
                'user_id' => $user->id
            ],[
                'user_id' => $user->id,
                'task_name' => $data['task']
            ]);
        }
    }


    public function category(Request $request)
    {
        $data =  $request->all();
        $user = User::where('email' , $data['user']['user']['email'] ?? 0)->first('id');

        $category = Category::where('name', $data['category'])->first();

        if($user){
            Tasks::updateOrCreate([
                'user_id' => $user->id
            ],[
                'category_name' => $category->name,
                'categorie_id' => $category->id,
                'status' => null
            ]);
        }
    }

    public function priority(Request $request)
    {
        $data =  $request->all();
        $user = User::where('email' , $data['user']['user']['email'] ?? 0)->first('id');

        
        if($user){
          $task =  Tasks::updateOrCreate([
                'user_id' => $user->id
            ],[
                'priority' => $data['priority'],
                'ticket' => $data['ticket'],
            ]);
        }

        return new Task($task);
    }

    public function choeseStatus(Request $request)
    {
        $data =  $request->all();

        // $user = User::where('email' , $data['user']['user']['email'] ?? 0)->first('id');
        Log::info($data['user']['action']);
        
        // if($user){
        //   $task =  Tasks::updateOrCreate([
        //         'user_id' => $user->id
        //     ],[
        //         'status' => (int) $data['status'],
        //     ]);
        // }

        // return new Task($task);
    }
}
