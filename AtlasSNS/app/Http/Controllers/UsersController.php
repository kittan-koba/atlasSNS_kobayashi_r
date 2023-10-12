<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Post;
use Validator;
use Auth;


class UsersController extends Controller
{
  //
  public function profile($id)
  {

    $user = auth()->user();
    $username = User::find($id);
    $post = Post::query()
      ->where('user_id', $id)->get();
    return view('users.profile', compact('post', 'username'));
  }

  public function useredit(Request $request)
  {
    $data = $request->all();
    $post = Post::query()
      ->where('user_id', Auth::id())->get();
    return view('users.userprofile', compact('post'));
  }

  public function userprofile(Request $request, User $user)
  {
    $data = $request->all();

    $validator = Validator::make($data, [
      'username' => ['required', 'string', 'min:2', 'max:12'],
      'password' => ['required', 'string', 'min:8', 'max:20', 'confirmed'],
      'bio' => ['string', 'max:150'],
      'mail' => 'required|string|email|max:255|unique:users,mail,' . Auth::id() . ',id',
    ], [
      'username.min' => 'ユーザー名は2文字以上で入力してください。',
      'username.max' => 'ユーザー名は12文字以内で入力してください。',
      'password.min' => 'パスワードは8文字以上で入力してください。',
      'password.max' => 'パスワードは20文字以内で入力してください。',
      'password.confirmed' => 'パスワードが一致しません。',
      'mail.unique' => '入力されたメールアドレスは既に使用されています。',
      'mail.email' => '正しいメールアドレスの形式で入力してください。',
      'bio.max' => 'Bioは150文字以内で入力してください。',
      'image' => 'file|mimes:jpeg,png,bmp,gif,svg|max:2048',
    ]);

    if ($validator->fails()) {
      return redirect()->back()
        ->withErrors($validator)
        ->withInput();
    }

    User::where('id', Auth::id())->update([
      'username' => $data['username'],
      'mail' => $data['mail'],
      'bio' => $data['bio'],
      'password' => bcrypt($data['password']),
    ]);

    $image_path = $request->file('image');

    if ($image_path != null) {
      $image_validator = Validator::make(['image' => $image_path], [
        'image' => ['file', 'image', 'mimes:jpeg,png,bmp,gif,svg', 'max:2048'],
      ]);

      if ($image_validator->fails()) {
        return redirect()->back()
          ->withErrors($image_validator)
          ->withInput();
      }

      $image = $image_path->store('public/images');
      Auth::user()->images = basename($image);
      Auth::user()->save();
    }

    return redirect('userprofile');
  }





  public function index(Request $request)
  {
    //  dd(User::with('User')->get());
    $keyword_name = $request->username;
    // dd($username);
    if (!empty($keyword_name)) {
      $query = User::query();
      $users = $query->where('username', 'like', '%' . $keyword_name . '%')->get();
      $message = "検索ワード：" . $keyword_name;
      //   dd($username);
      return view('users.search')->with([
        'users' => $users,
        'message' => $message,
      ]);
    } else {
      $users = User::latest()->get();
      return view('users.search', compact('users'));
    }


  }

  public function search(Request $request)
  {

    $keyword_name = $request->username;

    if (!empty($keyword_name)) {
      $query = User::query();
      $keyword_name = $query->where('username', 'like', '%' . $keyword_name . '%')->get();
      $message = "「" . $keyword_name . "」を含む名前の検索が完了しました。";
      //   dd($username);
      return view('users.search')->with([
        'username' => $keyword_name,
        'message' => $message,
      ]);
    } else {
      $message = "検索結果はありません。";
      return view('users.search')->with('message', $message);
    }
  }
  // public function follow(Request $request)
  // {
  //   $follow = auth()->user();
  //   $is_following = $follow->Following($user->id);
  //   if(!$following){
  //     $follow->follow($user->id);
  //     return back();
  //   }

  // }

  public function follow(User $user, $id)
  {
    $user = User::find($id);
    $follower = auth()->user();
    // フォローしているか
    $is_following = $follower->isFollowing($user->id);
    if (!$is_following) {
      // フォローしていなければフォローする
      $follower->follow($user->id);
      return back();
    }
  }
  public function unfollow(User $user, $id)
  {
    $user = User::find($id);
    $follower = auth()->user();
    // フォローしているか
    $is_following = $follower->isFollowing($user->id);
    if ($is_following) {
      // フォローしていればフォローを解除する
      $follower->unfollow($user->id);
      return back();
    }
  }
}
