<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
Use App\Comment;

class CommentsController extends Controller
{
    public function store() {

        $this->validate(request(), [
            'body' => 'required',
        ]);

        Comment::create([
            'body' => request('body'),
            'post_id' => request('post_id'),
            'user_id' => auth()->id(),
        ]);
        return back();
    }
}
