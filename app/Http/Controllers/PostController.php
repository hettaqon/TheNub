<?php

namespace App\Http\Controllers;
use App\Models\Post;
use Intervention\Image\Facades\Image;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function __construct()
    {
        $this->Post = new Post();
        $this->middleware('auth');
    }

    public function create()
    {
        return view('post.create');
    }

    public function store()
    {
        $data=request()->validate([
            'title' => 'required|max:255',
            'body' => 'required',
            'image' => 'required|image',
        ]);
        $imagePath = request('image')->store('uploads','public');

        $image = Image::make(public_path("storage/{$imagePath}"));
        $image->save();

        auth()->user()->posts()->create([
            'title' => $data['title'],
            'body' => $data['body'],
            'image' => $imagePath,
        ]);

        return redirect('/home');
    }

    public function show(Post $post)
    {
        return view('post.show', compact('post'));
    }

    public function edit(Post $post)
    {

        return view('post.edit',compact('post'));
        
    }

    public function update(Post $post)
    {
        $this->authorize('update', $post);
        $data = request()->validate([
            'title' => 'required|max:255',
            'body' => 'required',
            'image' => '',
        ]);
        
        
        if (request('image')){
            $imagePath = request('image')->store('uploads','public');
            
            $image = Image::make(public_path("storage/{$imagePath}"));
            $image->save();

            $imageArray = ['image' => $imagePath];
        }
        
        Post::where('id',$post->id)->update(array_merge(
            $data,
            $imageArray ?? []
        ));

        return redirect("/post/{$post->id}");
    }

    public function destroy(Post $post)
    {
        $this->authorize('destroy', $post);
        $post->delete();
        return redirect('/home');
        
    }
}
