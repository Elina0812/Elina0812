@extends('layouts.login')

@section('content')

<table class='anotherprofile'>

  <p><img src="/storage/images/{{ $user->images }}">
  </p>
  <label for="name">name</label>
  {{ $user->username }}
  <label for="bio">bio</label>
  {{ $user->bio }}
  @if($follow_list->contains('follow', $user->id))
  <th>
    <form action="/follow/delete" method="post">
      @csrf
      @method('delete')
      <input type="hidden" value="{{ $user->id }}" name="id">
      <input type="submit" class="btn" value="フォローをはずす">
    </form>
  </th>
  @else
  <th>
    <form action="/follow/create" method="post">
      @csrf
      <input type="hidden" value="{{ $user->id }}" name="id">
      <input type="submit" class="btn" value="フォローする">
    </form>
  </th>
  </tr>
  @endif

</table>
<table class='tweet-show table-hover'>
  @foreach($posts as $post)
  <tr>
    <th><img class='icon' src="/storage/images/{{ $post->images }}"></th>
    <th>{{ $post->username }}</th>
    <th>{{ $post->posts }}</th>
    <th>{{ $post->created_at}}</th>
  </tr>
  @endforeach
</table>
@endsection
