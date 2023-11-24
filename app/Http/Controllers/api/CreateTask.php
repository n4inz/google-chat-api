<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Tasks;
use App\Models\User;
use Illuminate\Http\Request;

class CreateTask extends Controller
{
    
    public function index(Request $request)
    {
        $data =  $request->all();
        $user = User::where('email' , $data['user']['user']['email'] ?? 0)->first('id');


        if($data['category_id']){
            $this->category($request);
        }


        if($user){
            Tasks::updateOrCreate([
                'user_id' => $user->id
            ],[
                'user_id' => $user->id,
                'task_name' => $data['task']
            ]);
        }
    }


    private static function category($request)
    {
        $data =  $request->all();
        $user = User::where('email' , $data['user']['user']['email'] ?? 0)->first('id');

        $category = Category::where('name', $data['category_id'])->first();

        if($user){
            Tasks::updateOrCreate([
                'user_id' => $user->id
            ],[
                'category_name' => $category->name,
                'categorie_id' => $category->id
            ]);
        }
    }
}
