@extends('layouts.login')

@section('content')

<form action="/searchresult" method="post">
  @csrf
  <input type="search" name="search" placeholder="キーワードを入力">
  <input type="submit" name="submit" value="検索">
</form>

@foreach($username as $usernames)
                <div style="padding-left:20px">
                    <div>{{ $usernames->username }}</div>

                </div>
@endforeach

@endsection
