@extends('layouts.login')
@section('content')

<table class='profile table'>
  <form method="post" action="/profile/update" enctype="multipart/form-data">
    @csrf
    <input type="hidden" name="user_id" value="{{ $auth->id }}">
    <div class='profile-icon'>
      <img class='icon' src="storage/images/{{ $auth->images }}">
    </div>
    <div class='profile'>
      <div class='profile-name'>
        <label for="name">UserName</label>
        <input class="form-control" id="username" value="{{ $users->username }}" name="username" type="text">
        @if($errors->has('username'))
        {{ $errors->first('username') }}
        @endif
      </div>
      <div class='profile-mail'>
        <label for="mail">MailAdress</label>
        <input class="form-control" id="mail" value="{{ $users->mail }}" name="mail" type="email">
        @if($errors->has('mail'))
        {{ $errors->first('mail') }}
        @endif
      </div>
      <div class='profile-password'>
        <label for="password">Password</label>
        <input class="form-control" id="inputPassword" placeholder="{{ $users->password }}" type="passsword" value="●●●●●●" readonly>
      </div>
      <div class='profile-NewPassword'>
        <label for="NewPassword">New Password</label>
        <input class="form-control" id="inputPassword" name="inputPassword" type="password">
        @if($errors->has('inputPassword'))
        {{ $errors->first('inputPassword') }}
        @endif
      </div>
      <div class='profile-bio'>
        <label for="bio">Bio</label>
        <textarea name="inputBio" class="form-control" id="inputBio">{{ $users->bio }}</textarea>
      </div>
      <div class='profile-NewIcon'>
        <label for="icon">Icon Image</label>
        <input class="custom-file-input" id="fileImage" name="image" type="file">
      </div>
      <div class='profile-btn'>
        <input class="btn-profile" type="submit" value="更新">
      </div>
    </div>
  </form>
</table>

@endsection
