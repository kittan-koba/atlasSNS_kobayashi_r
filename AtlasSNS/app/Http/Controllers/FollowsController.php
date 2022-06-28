<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Auth;

class FollowsController extends Controller
{
    //
    public function followList(Request $request){
        $follow = $request->username;
        return view('follows.followList');
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
        return view('follows.followerList');
    }
}
