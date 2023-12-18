<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Resources\Category as ResourcesCategory;
use App\Models\Category;
use App\Models\User;
use App\Models\Tasks;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;

class Categorys extends Controller
{
    
    public function index(Request $request)
    {
       
        $data = Category::query()->orderBy('id' , 'desc')->get();

        $user = User::where('email', $data['email'] ?? 0)->first('id');

        if ($user) {
            $task = Tasks::create([
                'user_id' => $user->id,
                // 'task_name' => "N",
                'created_at' => now()
            ]);
        }
        // return 'testing';
        // return ResourcesCategory::collection($data);
        return [
            'category' => ResourcesCategory::collection($data),
            'id_task' => $task->id,
        ];
    }

}
