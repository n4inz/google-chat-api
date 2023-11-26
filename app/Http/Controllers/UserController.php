<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\TypeUser;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $users = User::with('categories')->get()->toQuery()->orderBy('id', 'desc')->paginate(10);
        // $users = User::latest()->get()->toQuery()->paginate(20);

        return view('user.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $data = User::find($id);

        $categories = Category::all();
        return view('user.edit', compact('data', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        // $data = TypeUser::findOrFail('user_id', $id);
        // if($data){
        //     $type_usesr =  TypeUser::updateOrCreate([
        //         'categorie_id' => $request->input('categories')
        //       ],[
        //           'user_id' => $id,
        //           'categorie_id' => $request->input('categories'),
        //       ]);
        //   }
        $data = TypeUser::where('user_id', $id)->first();

        $category_id = $request->input('categories');
        $category = Category::find($category_id)->first();

        if ($data) {

            $data->update([
                'categorie_id' => $request->input('categories'),
                'name' => $category->name,
                // Add more fields as needed
            ]);
        } else {
            TypeUser::create([
                'user_id' => $id,
                'categorie_id' => $category_id,
                'name' => $category->name,
                // Add more fields as needed
            ]);
        }

        return redirect()->route('user')
            ->with('success', 'Category updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
