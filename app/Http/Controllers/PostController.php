<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostRequest;
use App\Http\Requests\UpdatePostRequest;
use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;

use Illuminate\Http\Request;
use Illuminate\Validation\Rules\Unique;

class PostController extends Controller
{
   
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $posts = Post::all();
        // dd($posts);
        return view('posts.index',compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        $tags = Tag::all();
        return view('posts.create',compact('categories','tags'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PostRequest $request)
    {
        $data = $request->all();

        if($request->hasFile('image')){
            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $imageName = time().' '.uniqid().'.'.$ext;
            $file->move(public_path('/images/posts'),$imageName);
            $data['image'] = '/images/posts/'.$imageName;
        }

        Post::create($data);
        return redirect()->route('posts.index')->with('success','Post created Successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $post = Post::find($id);
        return view('posts.show',compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $post = Post::find($id);
        $categories = Category::all();
        $tags = Tag::all();
        return view('posts.edit',compact('post','categories','tags'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePostRequest $request, string $id)
    {
        $post = Post::findOrFail($id);
        $data = $request->all();

        if($request->hasFile('image')){
            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $imageName = time().' '.uniqid().'.'.$ext;
            $file->move(public_path('/images/posts'),$imageName);
            $data['image'] = '/images/posts/'.$imageName;
        }
     $post::update($data);
      return redirect()->route('posts.index')->with('success','Products added successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $post = Post::find($id);
        $post->delete();
         return redirect()->route('posts.index')->with('success','Products added successfully');
    }
}
