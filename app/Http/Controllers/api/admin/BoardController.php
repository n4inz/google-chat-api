<?php

namespace App\Http\Controllers\api\admin;

use App\Http\Controllers\Controller;
use App\Http\Resources\TaskAdmin;
use App\Models\Tasks;
use Illuminate\Http\Request;

class BoardController extends Controller
{
   public function index(Request $request)
   {
        $user = $request->user();
        $task =  Tasks::query()->whereNotNull('priority')->get();

       return TaskAdmin::collection($task);
   } 

   public function taskCount(Request $request)
   {

        $taskOpen =  Tasks::where('status', 0)->count();
        $taskProgress =  Tasks::where('status', 1)->count();
        $taskResolved =  Tasks::where('status', 2)->count();

        return response()->json([
         'open' => $taskOpen,
         'on_progress' => $taskProgress,
         'resolved' => $taskResolved,
     ]);
   } 
}
