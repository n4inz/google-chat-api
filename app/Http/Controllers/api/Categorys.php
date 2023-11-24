<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Resources\Category as ResourcesCategory;
use App\Models\Category;
use App\Models\User;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;

class Categorys extends Controller
{
    
    public function index(Request $request)
    {
       
        return User::query()->with('type_users') ->whereHas('type_users', function ($queryJob) {
            $queryJob->where('categorie_id', 2);
        })->get();
        $data = Category::query()->orderBy('id' , 'desc')->get();
        // return 'testing';
        return ResourcesCategory::collection($data);
    }
}
