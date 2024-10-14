<?php

namespace App\Http\Controllers;

use App\Models\category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories=Category::paginate(10);
        return view('categories.index',[
          'categories'=>$categories
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('categories.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
    //    first validation 
      $request->validate([
        'name'=>'required|string|max:255',
        'description'=>'required|string|max:255',
        'status'=>'nullable'
      ]);
      Category::create([
        'name'=>$request->name,
        'description'=>$request->description,
         'status'=>$request->status==true ? 1:0,
      ]);
      return redirect('category')->with('status','Category Created Succesfuly');
    }

    /**
     * Display the specified resource.
     */
    public function show(category $category)
    {
        //
        return view('categories.show');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(category $category)
    {
        //
        return view('categories.edit',compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, category $category)
    {
        //
        $request->validate([
            'name'=>'required|string|max:255',
            'description'=>'required|string|max:255',
            'status'=>'nullable'
          ]);
          $category->update([
            'name'=>$request->name,
            'description'=>$request->description,
             'status'=>$request->status==true ? 1:0,
          ]);
          return redirect('category')->with('status','Category Update Succesfuly');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(category $category)
    {
        //
        $category->delete();
        return redirect('category')->with('status','Category Deleted Succesfuly');
    }
}
