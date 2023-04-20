@extends('layouts.login')

@section('content')

<table class='anotherprofile '>
  <div class='anotherprofile-icon'>
    <p><img class='icon' src="{{ asset('/storage/images/'. $user->images) }}">
    </p>
  </div>
  <div class='another-name'><label for="name">name</label>
    {{ $user->username }}
  </div>
  <div class='another-bio'>
    <label for="bio">bio</label>
    <p>{{ $user->bio }}</p>
  </div>
  @if($follow_list->contains('follow', $user->id))
  <td>
    <div class='another-follows'>
      <div class='follows-btn1'>
        <form action="/follow/delete" method="post">
          @csrf
          @method('delete')
          <input type="hidden" value="{{ $user->id }}" name="id">
          <input type="submit" class="btn-follows1" value="フォローをはずす">
        </form>
      </div>
    </div>
  </td>
  @else
  <td>
    <div class='another-follows'>
      <div class='follows-btn2'>
        <form action="/follow/create" method="post">
          @csrf
          <input type="hidden" value="{{ $user->id }}" name="id">
          <input type="submit" class="btn-follows2" value="フォローする">
        </form>
      </div>
    </div>
  </td>

  </tr>
  @endif

</table>

@foreach($posts as $post)
<table class='tweet-show table-hover'>
  <tr>
    <th><img class='icon' src="{{ asset('/storage/images/'. $post->images) }}"></th>
    <th>{{ $post->username }}</th>
    <th>{{ $post->created_at}}</th>
    <th>{{ $post->posts }}</th>

  </tr>
  @endforeach
</table>
@endsection
