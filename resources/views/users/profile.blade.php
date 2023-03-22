@extends('layouts.login')
@section('content')

<table class='profile table'>
  <form method="get" action="/user/{{ $users->id }}/profile" enctype="multipart/form-data">
    <img src="images/{{ $auth->images }}">
    <label for="name">UserName</label>
    <input class="form-control" id="inputName" value="{{ $users->username }}" name="inputName" type="text">
    <label for="mail">MailAdress</label>
    <input class="form-control" id="inputEmail" value="{{ $users->mail }}" name="inputEmail" type="email">
    <label for="password">Password</label>
    <input class="form-control" id="inputPassword" placeholder="{{ $users->password }}" name="inputPassword" type="passsword" value="●●●●●●">
    <label for="newpassword">New Password</label>
    <input class="form-control" id="inputPassword" placeholder="{{ $users->password }}" name="inputPassword" type="password" value="">
    <label for="bio">Bio</label>
    <input class="form-control" id="inputBio" value="{{ $users->username }}" name="inputBio" type="text">
    <label for="icon">Icon Image</label>
    <input class="custom-file-input" id="fileImage" name="image" type="file">
    <input class="btn" type="submit" value="Save">
  </form>

</table>


@endsection
