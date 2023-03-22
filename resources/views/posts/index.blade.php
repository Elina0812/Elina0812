@extends('layouts.login')

@section('content')

{!! Form::open(['url' => 'post/index']) !!}
{!! Form::input('text', 'Post', null, ['required', 'class' => 'form-control', 'placeholder' => '投稿内容']) !!}
<button type="submit" class="btn btn-success pull-right"><img src="images/post.png"></button>
{!! Form::close() !!}

<table class='table table-hover'>
  <tr>
    <th>投稿No</th>
    <th>投稿内容</th>
    <th>投稿日時</th>
    <th></th>
    <th></th>
  </tr>
  @foreach ($posts as $post)
  <tr>
    <td>{{ $post->id }}</td>
    <td>{{ $post->posts }}</td>
    <td>{{ $post->created_at }}</td>
    <td>
      <p class="modalopen" data-target="modal01"><img src="images/edit.png"></p>
    </td>
    <td>
      <form action="/post/{{ $post->id }}/delete" method="post">
        @csrf
        @method('delete')
        <input type="image" src="images/trash.png" class="btn btn-danger" onclick="return confirm('こちらの投稿を削除してもよろしいでしょうか？')">
      </form>
    </td>
  </tr>

</table>
<div class="modal-main js-modal" id="modal01">
  <div class="modal-inner">
    <div class="modal-content">
      <p class="inner-text">
        {!! Form::open(['url' => '/post/update']) !!}
        {!! Form::input('text', 'upPost', $post->posts, ['required', 'class' => 'form-control']) !!}
        {!! Form::close() !!}
      </p>
      <a class="send-button modalClose"><img src="images/edit.png"></a>
    </div>
  </div>
</div>
@endforeach
@endsection
