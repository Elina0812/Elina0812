@extends('layouts.logout')

@section('content')

{!! Form::open() !!}

<header>
  <p>Social Network Service</p>
</header>

<div class='login-box'>
  <h2>DAWNSNSへようこそ</h2>
  <div class='login-mail'>
    {{ Form::label('MailAddress') }}
  </div>
  <div class='login-text'>
    {{ Form::text('mail',null,['class' => 'input']) }}
  </div>
  <div class='login-password'>
    {{ Form::label('password') }}
  </div>
  <div class='login-text'>
    {{ Form::password('password',['class' => 'input']) }}<br>
  </div>
  <div class='login-btn'>
    {{ Form::submit('login',['class' => 'btn-login']) }}
  </div>
  <div class='login-register'>
    <p><a href="/register">新規ユーザーの方はこちら</a></p>
  </div>
</div>
{!! Form::close() !!}

@endsection
