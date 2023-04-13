@extends('layouts.login')

@section('content')
<div class="follower-container">
  <p>FollowerList</p>
  <div>
    @foreach ($users as $user)
    <a href="/anotherprofile/{{ $user->id }}">
      <img class="icon" src="/storage/images/{{ $user->images }}" alt="icon">
    </a>
    @endforeach
  </div>
  <table class='table table-hover'>
    <tr>
      <th>アイコン</th>
      <th>投稿内容</th>
      <th>投稿日時</th>
    </tr>
    @foreach ($latestPosts as $latestPost)
    <tr>
      <td>
        <a href="/anotherprofile/{{ $post->id }}">
          <img class="icon" src="/storage/images/{{ $post->images }}" alt="icon">
        </a>
      </td>
      <td>{{ $latestPost->images }}</td>
      <td>{{ $latestPost->posts }}</td>
      <td>{{ $latestPost->created_at }}</td>
    </tr>
    @endforeach
  </table>
</div>
@endsection
