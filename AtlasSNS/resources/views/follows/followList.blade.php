@extends('layouts.login')

@section('content')


<div class='follow-wrapper'>
  @foreach ($follow as $follows)
    <div>{{ $follow->username }}</div>
    @if ($follow)
    <button type="submit" class="btn btn-success pull-right">フォロー解除</button>
    @elseif ($unfollow)
    <button type="submit" class="btn btn-success pull-right">フォローする</button>
    @endif
  @endforeach
</div>
@endsection
