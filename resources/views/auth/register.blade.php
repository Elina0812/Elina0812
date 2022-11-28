@extends('layouts.logout')

@section('content')

{!! Form::open() !!}

<h2>新規ユーザー登録</h2>

{{ Form::label('ユーザー名') }}<br>
{{ Form::text('username',null,['class' => 'input']) }}<br>
@if($errors->has('username'))
{{ $errors->first('username') }}
@endif

{{ Form::label('メールアドレス') }}<br>
{{ Form::text('mail',null,['class' => 'input']) }}<br>
@if($errors->has('mail'))
{{ $errors->first('mail') }}
@endif

{{ Form::label('パスワード') }}<br>
{{ Form::text('password',null,['class' => 'input']) }}<br>
@if($errors->has('password'))
{{ $errors->first('password') }}
@endif

{{ Form::label('パスワード確認') }}<br>
{{ Form::text('password-confirm',null,['class' => 'input']) }}<br>
@if($errors->has('password-confirm'))
{{ $errors->first('password-confirm') }}
@endif

{{ Form::submit('登録') }}

<p><a href="/login">ログイン画面へ戻る</a></p>

{!! Form::close() !!}


@endsection
