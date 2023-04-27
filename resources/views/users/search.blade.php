@extends('layouts.login')

@section('content')
<div class='search-box'>
  <div class='search'>
    {!! Form::open(['url' => '/search']) !!}
    {!! Form::input('text', 'search', null, ['required', 'class' => 'form-control', 'placeholder' => 'ユーザー検索']) !!}</div>

  <input type="image" class="btn-search" src="images/post.png">
  {!! Form::close() !!}
  @if(isset($keyword))
  検索ワード:{{ $keyword }}
  @endif
</div>
<div>
  <table class='search-table table-hover'>
    @foreach($users as $user)
    <tr>
      <td>
        <div class='search-icon'>
          <a href="/anotherprofile/{{ $user->id }}">
            <img class='icon' src="/storage/images/{{ $user->images }}">
        </div>
        </th>
      <td>
        <div class='search-name'>{{ $user->username }}</div>
      </td>

      @if($follow_list->contains('follow', $user->id))
      <td>
        <div class='search-follows btn'>
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
        <div class='search-follows btn'>
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
    @endforeach
  </table>
</div>


@endsection
