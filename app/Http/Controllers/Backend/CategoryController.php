<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
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
        $categories = Category::orderBy('id' , 'desc')->get();
        return view('backend.categories.index' , compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validate = Validator::make($request->all(),[
            'name' => 'required|unique:categories',
            'status' => 'required',
        ] ,
        [
            'name.required' => 'Category Name is  required',
            'name.unique' => 'Category already exists !',
            'status.required' => 'Status is  required',
        ]);
        if ($validate->fails()) {
            return back()->withErrors($validate->errors())->withInput();
        } else {
        Category::create([
            'name' => $request->name,
            'status' => $request->status,
           ]);
           return redirect()->route('category.index')->with('success_msg' , 'Category added successfully');
        }
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
        $category = Category::where('id' , $id)->first();
        return view('backend.categories.edit' , compact('category'));
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
        $validate = Validator::make($request->all(),[
            'name' => 'required|unique:categories',
            'status' => 'required',
        ] ,
        [
            'name.required' => 'Category Name is  required',
            'name.unique' => 'Category already exists !',
            'status.required' => 'Status is  required',
        ]);
        if ($validate->fails()) {
            return back()->withErrors($validate->errors())->withInput();
        } else {
        Category::where('id' , $id)
        ->update(['name' => $request->name , 'status' => $request->status]);
        return redirect()->route('category.index')->with('success_msg' , 'Category updated successfully');
        }
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Category::find($id)->delete();
        return redirect()->route('category.index')->with('success_msg' , 'Category deleted successfully');
    }
}
