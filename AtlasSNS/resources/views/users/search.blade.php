@extends('layouts.login')

@section('content')

<form action="/search" method="get">
  @csrf
  <input type="text" name="username" placeholder="キーワードを入力">
  <input type="submit" name="submit" value="検索">
</form>
<div class="search-wrapper">
              @foreach($users as $user)

                <div style="padding-left:20px">
                 @if(!empty ($message))
                    <div>{{ $message }}</div>
                 @endif
                    <div>{{ $user->username }}</div>

                  <form action="{{ route('follow', ['followed_id' => $user->username]) }}" method="GET">
                    {{ csrf_field() }}
                     <button type="submit" class="btn btn-primary">フォローする</button>
                  </form>
                    <button type="submit" class="btn btn-success pull-right">フォロー解除</button>

                </div>
              @endforeach
</div>
<style></style>
@endsection
