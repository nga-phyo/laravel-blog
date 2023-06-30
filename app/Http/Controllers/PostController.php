<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use App\Http\Requests\PostRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;


class PostController extends Controller
{
    public function index(Request $request){

    //    $posts = Post::all();
    //    $posts = Post::latest()->paginate(5);

          $posts = Post::where('title', 'like' ,'%' . $request->search . '%')->paginate(5);

        // $posts = Post::select('posts.*','users.name')
        // ->join('users', 'posts.user_id', '=', 'users.id')
        // ->paginate(5);
       

       return view('posts.home',compact('posts'));
      
    }


    public function create(){

        return view('posts.create');
       
    }

    public function store(PostRequest $request){


        // $validator = Validator::make($request->all(),[

        //     'title' => 'required',
        //     'body' => 'required',
        // ]);

        // if($validator->fails()){

        //     return redirect('/post/create')->withErrors($validator)->withInput();
        // }


        //validate

        // $this->myvalidate($request);

        // $request->validate([

        //     'title' => 'required | min:5',
        //     'body' => 'required',
        // ]);


        // $post = new Post();
        
        // $post->title = request('title');
        // $post->body = request('body');
        
        // $post->title = $request->title ;
        // $post->body = $request->body ;
        // $post->created_at = now();
        // $post->updated_at = now();
 
        // $post->save();

        // session()->flash('success','A Post created successfully');

        Post::create([
            'title' => $request->title,
            'body' => $request->body,
            'user_id' => Auth::user()->id,
        ]);
 
        return redirect('posts')->with('success','A Post Created Successfully!');
 
 
     }


    public function show($id){

        // $post = Post::find($id);

        $post = Post::select('posts.*', 'users.name')
        ->join('users', 'users.id', '=', 'posts.user_id')
        ->where('posts.id' ,'=', $id)
        ->first();


        return view('posts.show',compact('post'));
        
    }

    public function update(PostRequest $request,$id){

      
        // $this->myvalidate($request);
        $post = Post::find($id);

         
        // $post->title = $request->title ;
        // $post->body = $request->body ;
        // $post->updated_at = now();

        // $post->save();

        $post->update([
            'title' => $request->title,
            'body' => $request->body,
            
        ]);

        return redirect('posts')->with('success','A Post Update Successfully!');
    }

    public function edit($id){

        $post = Post::find($id);

        return view('posts.edit',compact('post'));
    }


    public function destroy($id){

        // Post::where('id', 1) ->get() => array
        // Post::where('id', 1) ->first() => object

    //    $post = Post::find($id);
    //     $post->delete();

        Post::destroy($id);

        return redirect('posts')->with('success','A Post Delete Success!');
  


    }


    // public function myvalidate($request){

    //     $request->validate([
    //         'title' => 'required',
    //         'body' => 'required',
    //     ]);

    // }
}
