<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Asset;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;

class PostsController extends Controller
{
    public function __construct() {
        $this->middleware('auth')->except(['index','show']);
    }
    
    public function index() {
        $posts = Post::latest();
        $posts = request('month') ? $posts->whereMonth('created_at', Carbon::parse(request('month'))->month) : $posts;
        $posts = request('year') ? $posts->whereYear('created_at', request('year')) : $posts;
        $posts = $posts->paginate(5);

        return view('posts.index', compact('posts'));
    }

    public function show(Post $post) {                  

        return view('posts.show', compact('post'));
    }

    public function create() {

        return view('posts.create');
    }

    public function store(Request $request) {

        $this->validate(request(), [
            'title' => 'required',
            'body' => 'required',
            'file' => 'required',
        ]);

        $file = $request->file('file');

        //create new asset and save file to database
        $asset = Asset::create([
            'name' => $file->getClientOriginalName(),
        ]);
        $uniqueFilename = $asset->id . $file->getClientOriginalName();
        $file->storeAs('assets', $uniqueFilename);
        
        //create new post
        $post = Post::create([
                'title' => request('title'),
                'body' => request('body'),
                'user_id' => auth()->user()->id,
                'asset_id' => $asset->id,
        ]);

        session()->flash('message', 'The post has been created successfully');
        return redirect('/posts');
    }
}
