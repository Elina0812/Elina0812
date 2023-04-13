@extends('layouts.login')

@section('content')
{!! Form::open(['url' => '/search']) !!}
{!! Form::input('text', 'search', null, ['required', 'class' => 'form-control', 'placeholder' => 'ユーザー検索']) !!}
<input type="image" class="btn btn-success pull-right" src="images/post.png">
{!! Form::close() !!}
<div>
  <table class='table table-hover'>
    @foreach($users as $user)
    <tr>
      <td>
        <a href="/anotherprofile/{{ $user->id }}">
          <img class='icon' src="/storage/images/{{ $user->images }}">
          </th>
      <td>{{ $user->username }}</td>
      @if($follow_list->contains('follow', $user->id))
      <td>
        <form action="/follow/delete" method="post">
          @csrf
          @method('delete')
          <input type="hidden" value="{{ $user->id }}" name="id">
          <input type="submit" class="btn" value="フォローをはずす">
        </form>
      </td>
      @else
      <td>
        <form action="/follow/create" method="post">
          @csrf
          <input type="hidden" value="{{ $user->id }}" name="id">
          <input type="submit" class="btn" value="フォローする">
        </form>

      </td>
    </tr>
    @endif
    @endforeach
  </table>
</div>


@endsection
