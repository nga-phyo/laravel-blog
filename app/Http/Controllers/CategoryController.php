<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Prophecy\Call\Call;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        //---First---
        // $category = Category::all();
        // $category = Category::paginate(3);

        // if($request =request('search')){
        //     $category = Category::where('name', 'like', "%$request%")->latest('id')->paginate(4)->withQueryString();
        // }else {
        //     $category = Category::latest('id')->paginate(5);
        // }

            // ---Second---
        // $category = Category::query();
        // if($request =request('search')) {

        //     $category->where('name', 'like' ,"%$request%");
        // }

        // $category = $category->latest('id')->paginate(4)->withQueryString();


        // ---Third---


       $category = Category::when(request('search'), function($query){
           $query->where('name' ,'like', '%' . request('search') . '%');
        })
        ->latest('id')
        ->paginate('5')
        ->withQueryString();


        return view('category.index',compact('category'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       Category::create([
        'name'=>$request->name,
       ]);

       return redirect('categories');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
   

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = Category::find($id);

        return view('category.edit',compact('category'));
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
        $category = Category::find($id);

        $category->update([
            'name'=>$request->name,
        ]);

        return redirect('categories');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Category::destroy($id);

        return redirect('categories');
    }
}
