<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UsersController extends Controller
{
    //
    public function profile(){
        return view('users.profile');
    }
    public function index(Request $request){
     $keyword_name = $request->username;
    // dd($username);
    if(!empty($keyword_name)){
      $query = User::query();
      $users = $query->where('username','like', '%' .$keyword_name. '%')->get();
      $message = "「". $keyword_name ."」を含む名前の検索が完了しました。";
    //   dd($username);
      return view('users.search')->with([
        'users' => $users,
        'message' => $message,
      ]);
    }else {
    $users = User::latest()->get();
    return view('users.search',compact('users'));
    }


    }

    public function search(Request $request)
    {

      $keyword_name = $request->username;

      if(!empty($keyword_name)) {
      $query = User::query();
      $keyword_name = $query->where('username','like', '%' .$keyword_name. '%')->get();
      $message = "「". $keyword_name ."」を含む名前の検索が完了しました。";
    //   dd($username);
      return view('users.search')->with([
        'username' => $keyword_name,
        'message' => $message,
      ]);
    }
    else {
      $message = "検索結果はありません。";
      return view('users.search')->with('message',$message);
      }
}
    public function follow(Request $request)
    {
      $follow = $request->username;
      return view('follows.followList');
    }
}
