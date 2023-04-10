@extends('layouts.login')
@section('content')

<table class='profile table'>
  <form method="post" action="/profile/update" enctype="multipart/form-data">
    @csrf
    <img src="storage/images/{{ $auth->images }}">
    <label for="name">UserName</label>
    <input class="form-control" id="inputName" value="{{ $users->username }}" name="inputName" type="text">
    <label for="mail">MailAdress</label>
    <input class="form-control" id="inputEmail" value="{{ $users->mail }}" name="inputEmail" type="email">
    <label for="password">Password</label>
    <input class="form-control" id="inputPassword" placeholder="{{ $users->password }}" type="passsword" value="●●●●●●" readonly>
    <label for="newpassword">New Password</label>
    <input class="form-control" id="inputPassword" name="inputPassword" type="password">
    <label for="bio">Bio</label>
    <textarea name="inputBio" class="form-control" id="inputBio">{{ $users->bio }}</textarea>
    <label for="icon">Icon Image</label>
    <input class="custom-file-input" id="fileImage" name="image" type="file">
    <input class="btn" type="submit" value="更新">
  </form>

</table>


@endsection
