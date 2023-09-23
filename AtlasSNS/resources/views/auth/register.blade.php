@extends('layouts.logout')

@section('content')

{!! Form::open(['url' => '/register']) !!}
<h2>新規ユーザー登録</h2>

<!-- バリデーションエラーメッセージの表示 -->
@if ($errors->any())
<div class="alert alert-danger">
  <ul>
    @foreach ($errors->all() as $error)
    <li>{{ $error }}</li>
    @endforeach
  </ul>
</div>
@endif

{{ Form::label('ユーザー名') }}
{{ Form::text('username', null, ['class' => 'input']) }}

{{ Form::label('メールアドレス') }}
{{ Form::text('mail', null, ['class' => 'input']) }}

{{ Form::label('パスワード') }}
{{ Form::password('password', ['class' => 'input']) }}

{{ Form::label('パスワード確認') }}
{{ Form::password('password_confirmation', ['class' => 'input']) }}

{{ Form::submit('REGISTER', ['class' => 'register_button']) }}
{!! Form::close() !!}



@endsection
