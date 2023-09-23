@extends('layouts.login')

@section('content')

<div class="user_wrapper">
  @if (auth()->user()->images)
  <img src="{{ asset('storage/images/' .auth()->user()->images) }}" width="60px" height="60px">
  @else
  <img src="{{ asset('images/icon1.png') }}" width="60px" height="60px">
  @endif
  <form action="/updataprofile" method="post" enctype='multipart/form-data'>
    @csrf
    <div class="edit_wrapper">
      <div class="user_edit">
        <p class="user_text">user name </p>
        <input type="text" name="username" value="{{ auth()->user()->username }}" class="user_textbox" />
        @error('username')
        <div class="error">{{ $message }}</div>
        @enderror
      </div>
      <div class="user_edit">
        <p class="user_text">mail adress</p>
        <input type="text" name="mail" value="{{ auth()->user()->mail }}" class="user_textbox" />
        @error('mail')
        <div class="error">{{ $message }}</div>
        @enderror
      </div>
      <div class="user_edit">
        <p class="user_text">password</p>
        <input type="password" name="password" class="user_textbox">
        @error('password')
        <div class="error">{{ $message }}</div>
        @enderror
      </div>
      <div class="user_edit">
        <p class="user_text">password comfirm</p>
        <input type="password" name="password_confirmation" class="user_textbox">
      </div>
      <div class="user_edit">
        <p class="user_text">bio</p>
        <input type="text" name="bio" value="{{ auth()->user()->bio }}" class="user_textbox">
        @error('bio')
        <div class="error">{{ $message }}</div>
        @enderror
      </div>
      <div class="user_edit">
        <p class="user_text">icon image</p>
        <div class="file_backgroundbox">
          <label class="filebox">
            <input type="file" name="image" class="user_textbox">ファイルを選択
          </label>
          @error('image')
          <div class="error">{{ $message }}</div>
          @enderror
        </div>
      </div>
      <div class="update_type">
        <input type="submit" class="update_btn" value="更新" />
      </div>
    </div>
  </form>
</div>


@endsection
