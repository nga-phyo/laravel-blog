<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostRequest;
use App\Models\Post;
use App\Models\Category;
use App\Models\PostImage;
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

        $post = Post::where('title', 'like' ,'%' . $request->search . '%')->orderBy('id','asc')->paginate(4);


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
        
        
        $category = Category::all();
        return view('posts.create',compact('category'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostRequest $request)
    {


        
        // $path = $file->storeAs($dir, $fileName);



        // PostImage::create([
        //     'post_id' => $post->id,
        //     'path' => $path,
        // ]);

        $post = Post::create([
            'title'=>$request->title,
            'body'=>$request->body,
            'user_id'=> auth()->id(),
            // 'image' => '/upload/images/' . $fileName,

        ]);

        foreach($request->file('images') as $file){
            // $file =$request->file('image');

            $fileName =  time() . '_' .$file->getClientOriginalName();
    
            $dir = public_path('upload/images');
    
            $file->move($dir, $fileName);

            PostImage::create([
                'post_id' => $post->id,
                'path' => '/upload/images/' . $fileName,
            ]);
        }


        

       

       
       
    //    $imagepath = '/upload/images/' . $fileName;



        

         $post->categories()->attach($request->category_ids);

        // foreach($request->category_ids as $categoryId) {
        //     DB::table('category_post')->insert([
        //         'post_id' => $post->id,
        //         'category_id' => $categoryId,
        //     ]);
        // }

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


        $oldCategoryIds = $post->categories->pluck('id')->toArray();
        $category = Category::all();

        return view('posts.edit',compact('post','category','oldCategoryIds'))->with('success','A Post was Updating now');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PostRequest $request, $id)
    {

        
        $post = Post::find($id);

        $post->update($request->only(['title', 'body']));

        
        $post->categories()->sync($request->category_ids);

    //    $post->update([
    //     'title'=>$request->title,
    //     'body'=>$request->body,
    //    ]);
       return redirect('posts')->with('A post was Updated successfully');
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
