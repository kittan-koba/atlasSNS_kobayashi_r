<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use Auth;

class PostsController extends Controller
{
    //
    public function index(){
        $post = Post::latest()->get();
        return view('posts.index',compact('post'));
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
