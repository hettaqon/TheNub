<?php

namespace App\Http\Controllers;

use App\Models\Marketplace;
use Intervention\Image\Facades\Image;
use Illuminate\Http\Request;

class MarketplaceController extends Controller
{
    public function __construct()
    {
        $this->Post = new Marketplace();
        $this->middleware('auth');
    }
    public function index()
    {
        $posts = Marketplace::latest()->paginate(5);
        return view('market.index',compact('posts'));
    }
    public function create()
    {
        return view('market.create');
    }

    public function store()
    {
        $data=request()->validate([
            'product' => 'required|max:255',
            'description' => 'required',
            'price' => 'required|numeric',
            'image' => 'required|image',
        ]);
        $imagePath = request('image')->store('uploads','public');

        $image = Image::make(public_path("storage/{$imagePath}"));
        $image->save();

        auth()->user()->marketplaces()->create([
            'product' => $data['product'],
            'description' => $data['description'],
            'price' => $data['price'],
            'image' => $imagePath,
        ]);

        return redirect('/marketplace');
    }

    public function show(Marketplace $post)
    {
        return view('market.show', compact('post'));
    }

    public function edit(Marketplace $post)
    {

        return view('market.edit',compact('post'));
        
    }

    public function update(Marketplace $post)
    {

        $this->authorize('update', $post);
        $data = request()->validate([
            'product' => 'required|max:255',
            'description' => 'required',
            'price' => 'required|numeric',
            'image' => '',
        ]);
        
        
        if (request('image')){
            $imagePath = request('image')->store('uploads','public');
            
            $image = Image::make(public_path("storage/{$imagePath}"));
            $image->save();

            $imageArray = ['image' => $imagePath];
        }
        
        Marketplace::where('id',$post->id)->update(array_merge(
            $data,
            $imageArray ?? []
        ));

        return redirect("/marketplace/{$post->id}");
    }

    public function destroy(Marketplace $post)
    {
        $this->authorize('destroy', $post);
        $post->delete();
        return redirect('/marketplace');
        
    }
}
