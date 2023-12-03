<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\TypeUser;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Resources\UserResource;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Log;

class Users extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        return response()->json($users);
    }

    public function owners()
    {
        //
        $typeUsers = TypeUser::with(['category', 'user'])->get();

        return response()->json($typeUsers);
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $status['status'] = false;
        $status['message'] = "";

        $request->validate([
            'name' => 'required',
            'owners' => 'required'
        ]);
        $category = Category::create([
            'name' => $request->name
        ]);
        TypeUser::create([
            'user_id' => $request->owners,
            'categorie_id' => $category->id,
            'name' => $request->name
        ]);


       
        return response()->json($status); 
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        //
        $typeuser = TypeUser::with(['category' , 'user'])->find($id);

        // $user = User::find($typeuser->user_id);
        // $category = Category::find($typeuser->categorie_id);

        return response()->json(['typeuser' => $typeuser]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $status['status'] = false;
        $status['message'] = "";
        $status['data'] = "";

        $request->validate([
            'name' => 'required',
            'owners' => 'required'
        ]);


        $typeUser = TypeUser::with(['category' , 'user'])->find($id);

        $category = Category::find($typeUser->categorie_id);
        
        $category->name = $request->name;
        $category->save();

        $typeUser->user_id = $request->owners;
        $typeUser->categorie_id = $category->id;
        $typeUser->save();


        $status['status'] = true;
        $status['message'] = "Success";
        $status['data'] = $typeUser;
        return response()->json($status); 

    }

    public function delete(Request $request ,$id)
    {
        $status['status'] = false;
        $status['message'] = "";
        $typeUser = TypeUser::find($id);

        Category::where('id' , $typeUser->categorie_id)->delete();

        $typeUser->delete();

        $status['status'] = true;
        $status['message'] = "Success";
        return response()->json($status); 
    }
}
