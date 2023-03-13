@extends('layouts.login')

@section('content')
<div class="follower-container">
  <p>FollowerList</p>
  <p>{{ $auth->id }}</p>
</div>
@endsection
