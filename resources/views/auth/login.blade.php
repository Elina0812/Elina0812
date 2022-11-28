@extends('layouts.logout')

@section('content')

{!! Form::open() !!}

<h2>DAWNSNSへようこそ</h2>

{{ Form::label('e-mail') }}<br>
{{ Form::text('mail',null,['class' => 'input']) }}<br>
{{ Form::label('password') }}<br>
{{ Form::password('password',['class' => 'input']) }}<br>

{{ Form::submit('ログイン') }}

<p><a href="/register">新規ユーザーの方はこちら</a></p>

{!! Form::close() !!}

@endsection
