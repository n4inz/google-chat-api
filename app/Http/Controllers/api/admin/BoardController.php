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
}
