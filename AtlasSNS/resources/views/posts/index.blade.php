@extends('layouts.login')

@section('content')
<div class="container">
  {!! Form::open(['url' => '/top']) !!}
  <div class="border_top">
    <div class="newpost_content">
      <div class="newpostcontainer">
        <!-- <img src="{{ asset('storage/images/' .auth()->user()->images ) }}"  > -->
        @if (auth()->user()->images)
        <img src="{{ asset('storage/images/' .auth()->user()->images) }}">
        @else
        <img src="{{ asset('images/icon1.png') }}">
        @endif
        <div class="form-group">
          {!! Form::input('text', 'newPost', null, ['required', 'class' => 'form-control', 'placeholder' => '投稿内容を入力してください。']) !!}
        </div>

        <div class=newpost_btn>
          <button type="submit" class="btn btn-success pull-right">
            <img src="images/post.png">
          </button>
        </div>
      </div>
    </div>
  </div>
  {!! Form::close() !!}
  <div class="border_bottoms"></div>
  <div class="tweet-wrapper">
    @foreach($post as $post)
    @if (auth()->user()->isFollowing($post->user_id) || auth()->user()->id == $post->user_id)
    <div style="padding:2rem; border-top: solid 1px #E6ECF0; border-bottom: solid 1px #E6ECF0;">
      <div class="post_container">
        <div class="creattime">
          {{ $post->created_at->format('Y年m月d日 H:i') }}
        </div>
        <div class="post_box">
          @if ($post->user->images)
          <!-- 投稿ユーザーのアイコンを表示 -->
          <img src="{{ asset('storage/images/' . $post->user->images) }}" width="50" height="50">
          @else
          <img src="{{ asset('images/dawn.png') }}" width="50" height="50">
          @endif
          <div class="post_box_container">
            {{ $post->user->username }}
            <br>
            <br>
            {{ $post->post }}
          </div>
        </div>
        @if (auth()->user()->id == $post->user_id)
        <!-- ログインユーザーと投稿ユーザーが一致する場合に表示 -->
        <div class="edit_btn">
          <a class="js-modal-open" post="{{ $post->post }}" post_id="{{ $post->id }}"><img src="images/edit.png"></a>
          <a class="btn btn-danger" href="/post/{{ $post->id }}/delete" onclick="return confirm('こちらの投稿を削除してもよろしいでしょうか？')">
            <img class="delete-icon" src="images/trash.png">
          </a>
        </div>
        @endif
      </div>
    </div>
    @endif
    @endforeach

    <!-- モーダルコードなどはそのままで省略 -->

    <div class="modal js-modal">
      <div class="modal__bg js-modal-close"></div>
      <div class="modal__content">
        <form action="/update" method="POST">
          @csrf
          <input type="hidden" name="id" class="modal_id">
          <textarea name="post" class="modal_post"></textarea>
          <div class="modal_img">
            <input type="image" alt="更新" src="images/edit.png" action="/update" width="50" height="50">
          </div>
        </form>
      </div>
    </div>
  </div>

</div>

@endsection
