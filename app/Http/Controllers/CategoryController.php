<?php

namespace App\Http\Controllers;
use App\Models\Category;
use Illuminate\Http\Request;
use Validator;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts =  Category::all();
        return view('posts.category', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $posts =  DB::table('categories')->get();
      return view('layouts.header', compact('posts'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $validator = Validator::make(
        $request->all(),
        [
          "name" => ["required"],
          "body" => ["required"],
          "order" => ["required"],
          "id" => ["required"],
        ]
      );
      if ($validator -> fails()) {
        return [
          "status" => false,
          "errors" => $validator -> messages()
        ];
      }
      $category = Category::create([
        "name" => $request->name,
        "body" => $request->body,
        "order" => $request->order,
        "id" => $request->id
      ]);

      return[
        "status" => true,
        "menu" => $menu
      ];
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      $category = Category::find($id);
      if (!$category) {
        return response()->json([
          "status" => false,
          "message" => 'Post not found'
        ])->setStatusCode(404);
      }
      return $category;
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
