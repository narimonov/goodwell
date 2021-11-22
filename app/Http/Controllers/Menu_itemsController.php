<?php

namespace App\Http\Controllers;
use App\Models\Menu_items;
use Illuminate\Http\Request;
use Validator;

class Menu_itemsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $menues =  Menu_items::all();
        return view('layouts.header', compact('menues'));
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
      $validator = Validator::make(
        $request->all(),
        [
          "title" => ["required"],
          "url" => ["required"]
        ]
      );
      if ($validator -> fails()) {
        return [
          "status" => false,
          "errors" => $validator -> messages()
        ];
      }
      $menu = Menu_items::create([
        "title" => $request->title,
        "url" => $request->url
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
      $menu = Menu_items::find($id);
      if (!$menu) {
        return response()->json([
          "status" => false,
          "message" => 'Post not found'
        ])->setStatusCode(404);
      }
      return $menu;
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
