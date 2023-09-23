@extends('layouts.login')

@section('content')
<div class='follower-wrapper'>
  <div class="border_top">
    <div class="follower-list-top">
      <h2>Follower List</h2>
      @foreach ($follower as $followers)
      <div class="followlist_top">
        <a href="{{ url('/profile/' . $followers->id) }}">
          @if ($followers->images)
          <img src="{{ asset('storage/images/' . $followers->images) }}" width="50" height="50">
          @else
          <img src="{{ asset('images/dawn.png') }}" width="50" height="50">
          @endif
        </a>
      </div>
      @endforeach
    </div>
  </div>
  @foreach($post as $post)
  @if (auth()->user()->isFollowed($post->user->id))
  <div class="follower_post">
    <div class="creattime">
      {{ $post->created_at }}
    </div>
    <div class="follower_post_box">
      @if ($post->user->images)
      <img src="{{ asset('storage/images/' . $post->user->images) }}" width="50" height="50">
      @else
      <img src="{{ asset('images/dawn.png') }}" width="50" height="50">
      @endif
      <div class="follower-two-lines">
        <p>{{ $post->user->username }}</p>
        <br>
        <p>{{ $post->post }}</p>
      </div>
    </div>
  </div>
  @endif
  @endforeach


</div>
@endsection
