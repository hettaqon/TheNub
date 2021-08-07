<?php

namespace App\Http\Controllers;
use App\Models\Event;
use App\Models\EventOrganizer;
use Illuminate\Http\Request;

class EventController extends Controller
{
    public function __construct()
    {
        
        $this->middleware('auth');
    }

    public function index()
    {
        $events = EventOrganizer::latest()->paginate(5);
        return view('event.index',compact('events'));
    }

    public function createevent()
    {
        return view('event.creategroup');
    }

    public function storeevent()
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

        auth()->user()->events()->create([
            'name' => $data['name'],
            'image' => $imagePath,
            'description' => $data['description'],
            'short_description' => $data['short_description'],
            'url' => $data['url'],
            'user_id' => auth()->user()->id,

        ]);

        return redirect('/event');
    }

    public function showevent(EventOrganizer $event)
    {
        $posts = Event::latest()->paginate(5);
        return view('event.showevent', compact('posts','event'));
    }

    public function createpost()
    {
        return view('event.createpost');
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

        auth()->user()->events()->posts->create([
            'title' => $data['title'],
            'body' => $data['body'],
            'image' => $imagePath,
            'user_id' => auth()->user()->id,
            'group_id' => auth()->user()->events()->id,
        ]);

        return redirect('/event/'.auth()->user()->events()->id);
    }

    public function showpost(Event $posts)
    {
        
        return view('event.showpost', compact('posts'));
    }
}
