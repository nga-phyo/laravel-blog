<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

use function Ramsey\Uuid\v1;

class CategoryController extends Controller
{
    

    public function index(){

       $cats = Category::all();

       return view('cat.cathome',compact('cats'));
    }

    public function create(){
        
        return view('cat.category');
    }

    public function store(Request $request){

        $cat = new Category();

        $cat->cat_name = $request->cat_name;

        $cat->save();

        return redirect('cat')->with('yes', 'Category create success');
    }

    public function destroy($id){

        Category::destroy($id);

        session()->flash('yes','This Category was deleted successfully');

        return redirect('cat');
    }

    public function edit($id){

       $cat = Category::find($id);

       return view('cat.catedit',compact('cat'));
    }

    public function update(Request $request,$id){

       $cat = Category::find($id);

       $cat->cat_name = $request->cat_name;

       $cat->save();

       session()->flash('yes', 'Category Update Successfully');

       return redirect('cat');
    }

}
