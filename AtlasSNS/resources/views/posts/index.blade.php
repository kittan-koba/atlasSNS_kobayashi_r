@extends('layouts.login')

@section('content')
<div class="container">
            {!! Form::open(['url' => '/top']) !!}
            <div class="form-group">
                {!! Form::input('text', 'newPost', null, ['required', 'class' => 'form-control', 'placeholder' => '投稿内容を入力してください。']) !!}
            </div>
            <button type="submit" class="btn btn-success pull-right"><img src="images/post.png"></button>
            {!! Form::close() !!}
            <div class="tweet-wrapper"> <!-- この辺追加 -->
                @foreach($post as $post)
                <div style="padding:2rem; border-top: solid 1px #E6ECF0; border-bottom: solid 1px #E6ECF0;">
                    <div>{{ $post->post }}</div>
                    <a class="js-modal-open" post="{{ $post->post }}" post_id="{{ $post->id }}"><img src="images/edit.png"></a>
                    <a class="btn btn-danger" href="<?php echo $post["id"]; ?>" onclick="return confirm('こちらの投稿を削除してもよろしいでしょうか？')"><img src="images/trash.png"></delete.php?id=>
                </div>
                @endforeach
                <div class="modal js-modal">
                  <div class="modal__bg js-modal-close"></div>
                    <div class="modal__content">
                      <form action="" method="">
                        {!! Form::open(['url' => '/top']) !!}
                        <textarea name="" class="modal_post"></textarea>
                        <input type="hidden" name="" class="modal_id" value="">
                        <input type="image" alt="更新" src="images/edit.png">
                        {!! Form::close() !!}
                      </form>
                    </div>
                </div>
            </div>

</div>

@endsection
