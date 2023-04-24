@extends('layouts.logout')

@section('content')

<div class="clear">
  <p>{{ $name }}さん</p>
  <p>ようこそ！DAWNSNSへ！</p>
  <p>ユーザー登録が完了しました。</p>
  <p>さっそく、ログインをしてみましょう。</p>

  <p class="btn"><a href="/login">
      {{ Form::submit('ログイン画面へ', ['class' => 'btn-added']) }}</a></p>
</div>

@endsection
