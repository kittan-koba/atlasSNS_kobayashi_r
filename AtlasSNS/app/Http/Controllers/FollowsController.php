<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Auth;
use App\Post;

class FollowsController extends Controller
{
    //
    public function followList(){

        $follow = User::query()
                  ->whereIn('id', Auth::user()->follows()->pluck('followed_id'))->get();
        $post = Post::get();
        return view('follows.followList' , compact('follow' , 'post'));

        //userテーブルから情報→フォローしている人に絞る
        //userテーブルの自分のIDがfollowed_idに入っているのみ表示
    }
    //    public function follow(Request $request) {
    //     $follow = User::create([
    //         'following_id' => \Auth::user()->id,
    //         'followed_id' => $request->id,
    //     ]);
    //     return  view('follows.followList');
    // }

    // public function unfollow(Request $request) {
    //     $follow = User::where('following_id', \Auth::user()->id)->where('followed_id', $request->id)->first();
    //     $follow->delete();
    //     return view('follows.followList');
    // }
        public function followerList(){
        $follower = User::query()
                    ->whereIn('id', Auth::user()->followers()->pluck('following_id'))->get();
        $post = Post::get();
        return view('follows.followerList' , compact('follower' , 'post'));
    }
}
