<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8" />
  <!--IEブラウザ対策-->
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="description" content="ページの内容を表す文章" />
  <title></title>
  <link rel="stylesheet" href="{{ asset('css/reset.css') }} ">
  <link rel="stylesheet" href="{{ asset('css/style.css') }} ">
  <link rel="stylesheet" href="./bootstrap-4.3.1-dist/css/bootstrap.min.css">
  <!--スマホ,タブレット対応-->
  <meta name="viewport" content="width=device-width,initial-scale=1" />
  <!--サイトのアイコン指定-->
  <link rel="icon" href="画像URL" sizes="16x16" type="image/png" />
  <link rel="icon" href="画像URL" sizes="32x32" type="image/png" />
  <link rel="icon" href="画像URL" sizes="48x48" type="image/png" />
  <link rel="icon" href="画像URL" sizes="62x62" type="image/png" />
  <!--iphoneのアプリアイコン指定-->
  <link rel="apple-touch-icon-precomposed" href="画像のURL" />
  <!--OGPタグ/twitterカード-->
</head>
<body>
  <header>
    <div id="head">
      <h1><a href="{{ url('/top') }}"><img src="{{ asset('images/atlas.png') }}"></a></h1>
      <div>
        <div id="accordion" class="accordion-container">
          <div class="accordion-title js-accordion-title usertitle">
            <p class="username">{{ Auth::user()-> username }}    さん</p>
            @if (auth()->user()->images)
            <img src="{{ asset('storage/images/' .auth()->user()->images) }}" width="60px" height="60px">
            @else
            <img src="{{ asset('images/dawn.png') }}" width="60px" height="60px">
            @endif
          </div>
          <ul class="accordion-content">
            <li><a href="/top">HOME</a></li>
            <li><a href="/userprofile">プロフィール編集</a></li>
            <li><a href="/logout">ログアウト</a></li>
          </ul>
        </div>
      </div>
    </div>
  </header>
  <div id="row">
    <div id="container">
      @yield('content')

    </div>
    <div id="side-bar">
      <div class="border">
        <div id="confirm">
          <p>{{ Auth::user()-> username }}さんの</p>
          <div id="follow">
            <p>フォロー数</p>
            <p class="count">{{ Auth::user()->follows()->count() }}名</p>
          </div>
          <p class="btn_follow"><a href="/follow-list">フォローリスト</a></p>
          <div id="follower">
            <p>フォロワー数</p>
            <p class="count">{{ Auth::user()->followers()->count() }}名</p>
          </div>
          <p class="btn_follow"><a href="/follower-list">フォロワーリスト</a></p>
        </div>
      </div>
      <p class="btn_search"><a href="/search">ユーザー検索</a></p>
    </div>
  </div>
  <footer>
  </footer>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="{{ asset('js/login.js') }}"></script>
  <script src="{{ asset('js/update.js') }}"></script>

</body>
</html>
