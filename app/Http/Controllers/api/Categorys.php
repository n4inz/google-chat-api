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
        // ->whereHas('type_users.categorie_id', function ($queryJob) {
        //     $queryJob->where('categorie_id', 1);
        // })->get()
        return User::query()->with('type_users')->get();
        $data = Category::query()->orderBy('id' , 'desc')->get();
        // return 'testing';
        return ResourcesCategory::collection($data);
    }
}
