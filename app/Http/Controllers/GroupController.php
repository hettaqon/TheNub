<?php

namespace App\Http\Controllers;
use App\Models\Group;
use App\Models\GroupPost;
use App\Models\User;
use Intervention\Image\Facades\Image;
use Illuminate\Http\Request;

class GroupController extends Controller
{
    public function __construct()
    {
        
        $this->middleware('auth');
    }

    public function index()
    {
        $groups = Group::latest()->paginate(5);
        return view('group.index',compact('groups'));
    }

    public function creategroup()
    {
        return view('group.creategroup');
    }

    public function storegroup()
    {
        $data=request()->validate([
            'name' => 'required|max:255',
            'image' => 'required|image',
            'description' => '',
            'short_description' => '',
            'url' => '',
        ]);
        $imagePath = request('image')->store('uploads','public');
        $image = Image::make(public_path("storage/{$imagePath}"));
        $image->save();

        auth()->user()->groups()->create([
            'name' => $data['name'],
            'image' => $imagePath,
            'description' => $data['description'],
            'short_description' => $data['short_description'],
            'url' => $data['url'],
            'user_id' => auth()->user()->id,

        ]);

        return redirect('/group');
    }

    public function showgroup(Group $group)
    {
        $posts = GroupPost::latest()->paginate(5);
        return view('group.showgroup', compact('posts','group'));
    }

    public function createpost()
    {
        return view('group.createpost');
    }

    public function storepost()
    {
        $data=request()->validate([
            'title' => 'required|max:255',
            'body' => 'required',
            'image' => 'required|image',
        ]);
        $imagePath = request('image')->store('uploads','public');

        $image = Image::make(public_path("storage/{$imagePath}"));
        $image->save();

        auth()->user()->groups()->posts->create([
            'title' => $data['title'],
            'body' => $data['body'],
            'image' => $imagePath,
            'user_id' => auth()->user()->id,
            'group_id' => auth()->user()->groups()->id,
        ]);

        return redirect('/group/'.auth()->user()->groups()->id);
    }

    public function showpost(GroupPost $posts)
    {
        
        return view('group.showpost', compact('posts'));
    }

}