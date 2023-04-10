@extends('layouts.login')

@section('content')

<table class='anotherprofile table'>
  <p><img src="{{ asset('images/'. $user->images) }}">
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


@endsection
