@extends('layouts.login')

@section('content')

<div class="profile_user">
  <img src="{{ asset('storage/images/' .$username->images ) }}" width="50" height="50">
  <div class="two-lines">
    <p>name </p>
    <p>bio </p>
  </div>
  <div class="two-lines profile_name_bios">
    <p>{{ $username->username }}</p>
    <p>{{ $username->bio }}</p>
  </div>
  @if (auth()->user()->isFollowing($username->id))
  <div class="">
  </div>
  <form action="{{ route('unfollow', ['id' => $username->id]) }}" method="POST">
    {{ csrf_field() }}
    {{ method_field('DELETE') }}

    <button type="submit" class="btn btn-unfollow">フォロー解除</button>
  </form>
  @else
  <form action="{{ route('follow', ['id' => $username->id]) }}" method="POST">
    {{ csrf_field() }}

    <button type="submit" class="btn btn-primary">フォローする</button>
  </form>
  @endif
</div>

<div class="border_bottoms"></div>
@foreach($post as $post)
<div style="padding:2rem; border-top: solid 1px #E6ECF0; border-bottom: solid 1px #E6ECF0;">
  <div class="profile_post_box">
    <img src="{{ asset('storage/images/' .$username->images ) }}" width="50" height="50">
    <div class="two-lines">
      <p>{{ $post->user->username }}</p>
      <p>{{ $post->post }}</p>
    </div>
    <div class="profile_creattime">
      {{ $post->created_at }}
    </div>
  </div>
</div>
@endforeach
@endsection
