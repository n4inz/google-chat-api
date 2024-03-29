<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Resources\Task;
use App\Models\Category;
use App\Models\Tasks;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class CreateTask extends Controller
{

    public function index(Request $request)
    {
        $data = $request->all();
        
        $user = User::where('email', $data['user']['user']['email'] ?? 0)->first('id');

        if ($user) {
            $task = Tasks::updateOrCreate([
                'id' => $data['id'],
            ],[
                'user_id' => $user->id,
                'task_name' => $data['task'],
                'created_at' => now()
            ]);
            // $task = Tasks::create([
            //     'user_id' => $user->id,
            //     'task_name' => $data['task'],
            //     'created_at' => now()
            // ]);
            return response()->json([
                'id' => $task->id,
            ], 200);
        }
    }

    public function category(Request $request)
    {
        $data = $request->all();
        // $jsonString = $request->getContent();
        // $data = json_decode($jsonString, true);
        // $data = json_decode($request->all(), true);
        $user = User::where('email', $data['user']['user']['email'] ?? 0)->first('id');
        // $user = User::where('email', $data['email'] ?? 0)->first('id');

        $category = Category::where('name', $data['category'])->first();
        // $cardId = $data['user']['message']['cardsV2'][0]['cardId'];
        if ($user) {
            $task = Tasks::updateOrCreate([
                'id' => $data['task_id'],
                'user_id' => $user->id,
            ], [
                
                'category_name' => $category->name,
                'categorie_id' => $category->id,
                'status' => 0,
            ]);
            return response()->json([
                'id' => $task->id,
            ], 200);
        }

    
    }

    public function priority(Request $request)
    {
        $data = $request->all();
        $user = User::where('email', $data['user']['user']['email'] ?? 0)->first('id');

        // $cardId = $data['user']['message']['cardsV2'][0]['cardId'];

        if ($user) {
            $task = Tasks::updateOrCreate([
                'id' => $data['task_id'],
            ], [
                'ticket' => $data['ticket'],
                'priority' => $data['priority'],
                
            ]);
        }

        return new Task($task);
    }

    public function choeseStatus(Request $request)
    {
        $data = $request->all();

        $user = User::where('email', $data['user']['user']['email'] ?? 0)->first('id');
        Log::info($data['user']);
        $code = $data['user']['message']['cardsV2'][0]['card']['header']['title'];
        // $code = $data['user']['message']['cards'][0]['header']['title'];

        $parts = explode("#", $code);

        if ($user) {
            $task = Tasks::updateOrCreate([
                'ticket' => $parts[1],
            ], [
                'status' => (int) $data['status'],
            ]);
            return new Task($task);
        }

    }
}
