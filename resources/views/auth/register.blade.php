@extends('layouts.logout')

@section('content')

{!! Form::open() !!}

<div class='register'>
  <h2>新規ユーザー登録</h2>

  <div class='register-username'>
    {{ Form::label('UserName') }}
    <div class='register-text'>
      {{ Form::text('username',null,['class' => 'input']) }}
    </div>
    @if($errors->has('username'))
    {{ $errors->first('username') }}
    @endif
  </div>
  <div class='register-mail'>
    {{ Form::label('MailAddress') }}
  </div>
  <div class='register-text'>
    {{ Form::text('mail',null,['class' => 'input']) }}
  </div>
  @if($errors->has('mail'))
  {{ $errors->first('mail') }}
  @endif

  <div class='register-password'>
    {{ Form::label('Password') }}
  </div>
  <div class='register-text'>
    {{ Form::text('password',null,['class' => 'input']) }}
  </div>
  @if($errors->has('password'))
  {{ $errors->first('password') }}
  @endif
  <div class='register-password'>
    {{ Form::label('Password confirm') }}
  </div>
  <div class='register-text'>
    {{ Form::text('password-confirm',null,['class' => 'input']) }}
  </div>
  @if($errors->has('password-confirm'))
  {{ $errors->first('password-confirm') }}
  @endif
  <div class='register-btn'>
    {{ Form::submit('登録', ['class' => 'btn-register']) }}
  </div>
  <p><a href="/login">ログイン画面へ戻る</a></p>
  {!! Form::close() !!}
</div>

@endsection
