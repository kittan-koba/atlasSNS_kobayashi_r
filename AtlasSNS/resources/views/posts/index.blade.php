@extends('layouts.login')

@section('content')
<h2>機能を実装していきましょう。</h2>

<form action="{{ route('logout') }}" method="post">
  @csrf
  <input type="submit" value="ログアウト">
  <a href="/logout">ログアウト</a>
</form>

@endsection
