<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
    //   $post = Post::all();
        // $post = post::paginate(3);

        $post = Post::where('title', 'like' ,'%' . $request->search . '%')->orderBy('id','desc')->paginate(4);


        // $post = Post::select('posts.*','users.name as author')
        // ->join('users','users.id' ,'=','posts.user_id')
        // ->orderBy('id', 'desc')
        // ->paginate(3);



        
        

       return view('posts.index',compact('post'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        

        return view('posts.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Post::create([
            'title'=>$request->title,
            'body'=>$request->body,
            'user_id'=> auth()->id(),

        ]);

        session()->flash('success','A Post was Created');
        return redirect('posts');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // $post = Post::find($id);

        $post = Post::select('posts.*','users.name as author')
        ->join('users','users.id', '=', 'posts.user_id')
       
        ->first();



        return view('posts.show',compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::find($id);

        return view('posts.edit',compact('post'))->with('success','A Post was Updating now');
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

        
        $post = Post::find($id);

       $post->update([
        'title'=>$request->title,
        'body'=>$request->body,
       ]);
       return redirect('posts');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Post::destroy($id);

        return redirect('posts')->with('success','A Post was Deleted successfully');
    }
}
