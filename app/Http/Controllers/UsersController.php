<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Post;
use Carbon\Carbon;

class UsersController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }

    public function show(User $user) {
        $posts = Post::latest()->where('user_id', $user->id);
        $posts = request('month') ? $posts->whereMonth('created_at', Carbon::parse(request('month'))->month) : $posts;
        $posts = request('year') ? $posts->whereYear('created_at', request('year')) : $posts;
        $posts = $posts->paginate(5);

        return view('users.show', compact('posts','user'));
    }
}
