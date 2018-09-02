<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Http\Requests\PostRequest;

class PostController extends Controller
{

    public function __construct()
    {
        $this->middleware('permission:update-post,view-post');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        if($request->q){
            return $this->search($request->q);
        }

        $posts = Post::all();
        return view('post.index',compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $post = null;
        return view('post.create',compact('post'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostRequest $request)
    {

        $user = \Auth::user();

        $user->posts()->create([
            'title' => $request->title,
            'content' => $request->content,
        ]);

        // if ($request->hasFile('image')) 
        //     $request->file('image')->move(public_path().'/img/',uniqid().".png");

        session()->flash('message', 'Create Post Success');
        return redirect()->route('post.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::find($id);

        return view('post.show')->with(compact('post'));
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
        return view('post.create',compact('post'));
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
        $post->title = $request->title;
        $post->content = $request->content;
        $post->save();
        session()->flash('message', 'Update Post Success');
        return redirect()->route('post.edit',$id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::find($id);
        $post->delete();
        session()->flash('message', 'Delete Post Success');
        return redirect()->route('post.index');
        // return view('post.index');
    }


    public function search($q)
    {
        $post = Post::where('title','like',"%$q%")->get();
        return response()->json([
            'statusCode' => '2001001',
            'payload' => $post
        ],200);
    }
}
