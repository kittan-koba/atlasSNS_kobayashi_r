<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use Auth;
use App\User;
use Carbon\Carbon;

class PostsController extends Controller
{
    //
    public function index()
    {

        $post = User::query()->whereIn('id', Auth::user()->follows()->pluck('followed_id'))->orWhere('id', Auth::user()->id)->latest()->get();
        $post = Post::latest()->get();

        $followedUserIds = Auth::user()->follows()->pluck('followed_id')->toArray();
        $followedUserIds[] = Auth::user()->id;

        $posts = Post::whereIn('user_id', $followedUserIds)
            ->latest()
            ->get();

        return view('posts.index', compact('post'));
    }

    public function create(Request $request)
    {

        // $post = $request->input('newPost');
        // dd($post);
        Post::create([
            'user_id' => Auth::user()->id,
            'post' => $request->newPost,
        ]);
        return back();
    }

    public function update(Request $request)
    {

        $id = $request->input('id');
        // dd($id);
        $post = $request->input('post');
        \DB::table('posts')
            ->where('id', $id)
            ->update(
                ['post' => $post]
            );

        return redirect('top');
    }
    public function delete($id)
    {
        \DB::table('posts')
            ->where('id', $id)
            ->delete();

        return redirect('top');
    }


}
