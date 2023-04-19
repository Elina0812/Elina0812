@extends('layouts.login')

@section('content')
<div class="follows-container">
  <p>Follower List</p>
  <div class='follow-icon'>
    @foreach ($users as $user)
    <a href="/anotherprofile/{{ $user->id }}">
      <img class="icon" src="/storage/images/{{ $user->images }}" alt="icon">
    </a>
    @endforeach
  </div>
  <table class='table table-hover'>

    @foreach ($latestPosts as $latestPost)
    <tr>
      <td>
        <a href="/anotherprofile/{{ $latestPost->id }}">
          <img class="icon" src="/storage/images/{{ $latestPost->images }}" alt="icon">
        </a>
      </td>
      <td>{{ $latestPost->username }}</td>
      <td>{{ $latestPost->posts }}</td>
      <td>{{ $latestPost->created_at }}</td>
    </tr>
    @endforeach
  </table>
</div>
@endsection
