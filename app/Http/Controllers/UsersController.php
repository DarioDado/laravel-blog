<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Post;
use Carbon\Carbon;
use App\Asset;
use Illuminate\Support\Facades\Storage;

class UsersController extends Controller
{
    /**
     * Constructor
     */
    public function __construct() {
        $this->middleware('auth')->except(['show',]);
    }

    /**
     * Fetch user, related posts and render user show page
     *
     * @param User $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user) {
        $posts = Post::latest()->where('user_id', $user->id);
        $posts = request('month') ? $posts->whereMonth('created_at', Carbon::parse(request('month'))->month) : $posts;
        $posts = request('year') ? $posts->whereYear('created_at', request('year')) : $posts;
        $posts = $posts->paginate(5);

        return view('users.show', compact('posts','user'));
    }

    /**
     * Render edit user page
     *
     * @param User $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user) {

        return view('users.edit', compact('user'));
    }

    /**
     * Update user data and related asset, redirect to user show page
     *
     * @param User $user
     * @return \Illuminate\Http\Response
     */
    public function update(User $user) {
        //validate inputs
        $this->validate(request(), [
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'email' => 'required|email',
        ]);

        $file = request()->file('file') ? request()->file('file') : null;
        
        //set new values
        $user->first_name = request('first_name');
        $user->last_name = request('last_name');
        $user->email = request('email');

        //delete old and create headline image if asset is updated
        if($file) {
            Storage::delete('assets/' . $user->asset->id . $user->asset->name);
            $user->asset->delete();
            $asset = Asset::create([
                'name' => $file->getClientOriginalName(),
            ]);
            $uniqueFilename = $asset->id . $file->getClientOriginalName();
            $file->storeAs('assets', $uniqueFilename);
            $user->asset_id = $asset->id;
        }

        //update post
        $user->save();

        session()->flash('message', 'Your profile has been updated successfully');
        return redirect('/users/' . $user->id);
    }
}
