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
  </tr>
  @foreach ($posts as $post)
  <tr>
    <td>{{ $post->id }}</td>
    <td>{{ $post->posts }}</td>
    <td>{{ $post->created_at }}</td>
    <td>
      <p class="modalopen" data-target="modal01"><img src="images/edit.png"></p>
    </td>
  </tr>
  @endforeach
</table>
<div class="modal-main js-modal" id="modal01">
  <div class="modal-inner">
    <div class="modal-content">
      <p class="inner-text">
        つぶやいた内容を表示します。
      </p>
      <a class="send-button modalClose"><img src="images/edit.png"></a>
    </div>
  </div>
</div>
@endsection
