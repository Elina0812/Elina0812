@extends('layouts.login')

@section('content')
<div class="follows-container">
  <p>FollowList</p>
  <div class='follow-icon'>
    @foreach ($users as $user)
    <a href="/anotherprofile/{{ $user->id }}">
      <img class="icon" src="/storage/images/{{ $user->images }}" alt="icon">
    </a>
    @endforeach
  </div>
  @foreach ($latestPosts as $latestPost)
  <table class='tweet-show table-hover'>
    <tr>
      <td>
        <div class='tweet-icon'>
          <a href="/anotherprofile/{{ $latestPost->id }}">
            <img class="icon" src="/storage/images/{{ $latestPost->images }}" alt="icon">
        </div>
        </a>
      </td>
      <td>
        <div class='name'>
          {{ $latestPost->username}}
        </div>
      </td>
      <td>
        <div class='created_at'>
          {{ $latestPost->created_at }}
        </div>
        <div class='posts'>
          {{ $latestPost->posts }}
        </div>
      </td>
    </tr>
    @endforeach
  </table>
</div>

@endsection
