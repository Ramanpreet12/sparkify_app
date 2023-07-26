<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Subcategory;
use App\Models\Category;
use Validator;

class SubcategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $categories = Category::get();
        $subcategories = Subcategory::with('category')->orderBy('created_at' , 'desc')->get();
        return view('backend.subcategories.index' , compact('subcategories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::get();
        return view('backend.subcategories.create' , compact('categories'));
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
            'category' => 'required',
            'name' => 'required|unique:subcategories',
            'status' => 'required',
        ] ,
        [
            'category.required' => 'Category Name is  required',
            'name.required' => 'Subcategory Name is  required',
            'name.unique' => 'Subcategory already exists !',
            'status.required' => 'Status is  required',
        ]);
        if ($validate->fails()) {
            return back()->withErrors($validate->errors())->withInput();
        } else {

        Subcategory::create([
            'categories_id' => $request->category,
            'name' => $request->name,
            'status' => $request->status,
           ]);
           return redirect()->route('subcategory.index')->with('success_msg' , 'Subcategory added successfully');
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
        $categories = Category::get();
        $subcategory = Subcategory::where('id' , $id)->first();
        return view('backend.subcategories.edit' , compact('categories' , 'subcategory'));

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
            'category' => 'required',
            'name' => 'required|unique:subcategories',
            'status' => 'required',
        ] ,
        [
            'category.required' => 'Category Name is  required',
            'name.required' => 'Subcategory Name is  required',
            'name.unique' => 'Subcategory already exists !',
            'status.required' => 'Status is  required',
        ]);
        if ($validate->fails()) {
            return back()->withErrors($validate->errors())->withInput();
        } else {

        Subcategory::where('id' , $id)
        ->update(['categories_id' => $request->category , 'name' => $request->name , 'status' => $request->status]);
        return redirect()->route('subcategory.index')->with('success_msg' , 'Subcategory updated successfully');
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
        Subcategory::find($id)->delete();
        return redirect()->route('subcategory.index')->with('success_msg' , 'Subcategory deleted successfully');
    }
}
