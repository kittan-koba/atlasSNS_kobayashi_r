@extends('layouts.login')

@section('content')

<form action="/search" method="get">
  <div class="usersearch_top">
    <div class="border_top">
      @csrf
      <input type="text" name="username" class="search_area" placeholder="ユーザー名">
      <button type="submit" name="submit" class="search_btn">
        <img src="images/search.png"></button>
    </div>
    @if(!empty ($message))
    <div class="search_result_message">{{ $message }}</div>
    @endif
  </div>
  <div class="border_bottoms"></div>
</form>

<div class="search-wrapper">
  @foreach($users as $user)
  @if ($user->id !== auth()->user()->id)
  <!-- ログインユーザー以外のユーザーを表示 -->
  <div style="padding-left:20px">
    <div class="search_container">
      <p class="search_username">{{ $user->username }}</p>
      @if (auth()->user()->isFollowing($user->id))
      @if ($user->images)
      <!-- フォローしているユーザーの画像を表示 -->
      <img src="{{ asset('storage/images/' . $user->images) }}" width="60px" height="60px">
      @else
      <img src="{{ asset('images/dawn.png') }}" width="60px" height="60px">
      @endif
      <form action="{{ route('unfollow', ['id' => $user->id]) }}" method="POST">
        {{ csrf_field() }}
        {{ method_field('DELETE') }}

        <button type="submit" class="btn btn-remove">フォロー解除</button>
      </form>
      @else
      @if ($user->images)
      <!-- フォローしていないユーザーの画像を表示 -->
      <img src="{{ asset('storage/images/' . $user->images) }}" width="60px" height="60px">
      @else
      <img src="{{ asset('images/dawn.png') }}" width="60px" height="60px">
      @endif
      <form action="{{ route('follow', ['id' => $user->id]) }}" method="POST">
        {{ csrf_field() }}

        <button type="submit" class="btn btn_refollow">フォローする</button>
      </form>
      @endif
    </div>
  </div>
  @endif
  @endforeach


</div>
<style></style>
@endsection
