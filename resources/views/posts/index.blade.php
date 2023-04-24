@extends('layouts.login')

@section('content')

<div class="tweet">
  <div class='tweet-icon'>
    <img class="icon" src="{{ asset('/storage/images/'. $auth->images) }}">
  </div>
  {!! Form::open(['url' => 'post/index']) !!}
  {!! Form::input('text', 'Post', null, ['required', 'class' => 'form-control', 'placeholder' => '投稿内容']) !!}
  <button type="submit" class="btn-tweet"><img src="images/post.png"></button>
  {!! Form::close() !!}
</div>


@foreach ($posts as $post)
<table class='tweet-show table-hover'>
  <tr>
    <td>
      <div class='tweet-icon'>
        <img class="icon" src="{{ asset('/storage/images/'. $post->images) }}">
      </div>
    </td>
    <td>
      <div class='name'>
        {{ $post->username }}
      </div>
    </td>
    <td>
      <div class='created_at'> {{ $post->created_at }} </div>

      <div class='posts'> {{ $post->posts }} </div>


      <div class="modalopen" data-target="modal01"><img src="images/edit.png" class='btn-update'></div>


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
