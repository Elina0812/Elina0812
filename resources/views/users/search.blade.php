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
      <th><img src="/images/{{ $user->images }}"></th>
      <th>{{ $user->username }}</th>
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
    @endforeach
  </table>
</div>


@endsection
