@extends('layouts.login')

@section('content')
<div class="follow-container">
  <p>FollowList</p>
  <div>
    @foreach ($users as $user)
    <a href="/anotherprofile/{{ $user->id }}">
      <img src="/images/{{ $user->images }}" alt="icon">
    </a>
    @endforeach
  </div>
  <table class='table table-hover'>
    <tr>
      <th>アイコン</th>
      <th>投稿内容</th>
      <th>投稿日時</th>
    </tr>
    @foreach ($latestPosts as $post)
    <tr>
      <td>
        <a href="/anotherprofile/{{ $post->id }}">
          <img src="/images/{{ $post->images }}" alt="icon">
        </a>
      </td>
      <td>{{ $post->posts }}</td>
      <td>{{ $post->created_at }}</td>
    </tr>
    @endforeach
  </table>
</div>

@endsection
