@extends('layouts.login')

@section('content')
{!! Form::open(['url' => '/search']) !!}
{!! Form::input('text', 'search', null, ['required', 'class' => 'form-control', 'placeholder' => 'ユーザー検索']) !!}
<input type="image" class="btn btn-success pull-right" src="images/post.png">
{!! Form::close() !!}
<div>
  @foreach($users as $user)
  <div>
    <img src="/images/{{$user->images}}">
    {{$user->username}}
  </div>
  @endforeach

</div>


@endsection
