@extends('layouts.login')

@section('content')


<div class='follow-wrapper'>
  <div class="border_top">
    <div class="follow-list-top">
      <h2>Follow List</h2>
      @foreach ($follow as $follows)
      <a href="{{ url('/profile/' .$follows -> id ) }}">
        @if ($follows->images)
        <img src="{{ asset('storage/images/' . $follows->images) }}" width="50" height="50">
        @else
        <img src="{{ asset('images/dawn.png') }}" width="50" height="50">
        @endif
        <!-- {{ $follows -> id }} -->
      </a>
      <div class="border_bottoms"></div>
      @endforeach
    </div>
  </div>
  @foreach($post as $post)
  @if (auth()->user()->isFollowing($post->user->id))
  <div class="follow_post">
    <div class="creattime">
      {{ $post->created_at }}
    </div>
    <div class="follow_post_box">
      @if ($follows->images)
      <img src="{{ asset('storage/images/' . $follows->images) }}" width="50" height="50">
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
