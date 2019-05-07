<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Asset;
use App\PostCategory;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;

class PostsController extends Controller
{
    public function __construct() {
        $this->middleware('auth')->except(['index','show','search']);
    }
    
    public function index() {
        $posts = Post::latest();
        $posts = request('term') ? $posts->where('title', 'like', '%' . request('term') . '%')->orWhere('body', 'like', '%' . request('term') . '%') : $posts;
        $posts = request('month') ? $posts->whereMonth('created_at', Carbon::parse(request('month'))->month) : $posts;
        $posts = request('year') ? $posts->whereYear('created_at', request('year')) : $posts;
        $posts = request('category') ? $posts->where('category_id', request('category')) : $posts;
        $posts = $posts->paginate(5);

        return view('posts.index', compact('posts'));
    }

    public function show(Post $post) {                  

        return view('posts.show', compact('post'));
    }

    public function create() {

        $categories = PostCategory::all();
        return view('posts.create', compact('categories'));
    }

    public function store(Request $request) {

        $this->validate(request(), [
            'title' => 'required',
            'body' => 'required',
            'file' => 'required',
            'category' => 'required',
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
                'category_id' => request('category'),
        ]);

        session()->flash('message', 'The post has been created successfully');
        return redirect('/posts');
    }

    public function delete(Post $post) {                  

        //delete related comments
        $post->comments->each->delete();
        
        //delete related asset
        Storage::delete('assets/' . $post->asset->id . $post->asset->name);
        $post->asset->delete();
        
        //delete post
        $post->delete();
        session()->flash('message', 'The post has been deleted successfully');
        return redirect('/posts');
    }
}
