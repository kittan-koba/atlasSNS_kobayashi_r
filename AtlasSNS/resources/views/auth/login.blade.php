@extends('layouts.logout')

@section('content')

{!! Form::open(['url' => '/login']) !!}

<p>AtlasSNSへようこそ</p>

{{ Form::label('mail address') }}
{{ Form::text('mail',null,['class' => 'input']) }}
{{ Form::label('password') }}
{{ Form::password('password',['class' => 'input']) }}

{{ Form::submit('LOGIN',['class' => 'login_button']) }}


<p><a href="/register">新規ユーザーの方はこちら</a></p>

{!! Form::close() !!}

@endsection
