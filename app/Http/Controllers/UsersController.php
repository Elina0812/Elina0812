<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Auth;
use DB;
use Illuminate\Validation\Rule;

class UsersController extends Controller
{
    public function profile()
    {
        $auth = Auth::user();
        $follow_count = DB::table('follows')
            ->where('follower', Auth::id())
            ->count();
        $follower_count = DB::table('follows')
            ->where('follow', Auth::id())
            ->count();
        $posts = DB::table('posts')->get();
        $users = DB::table('users')
            ->where('id', Auth::id())
            ->first();
        return view('users.profile', compact('auth', 'follow_count', 'follower_count', 'posts', 'users'));
    }



    public function update(Request $request)
    {
        $auth_mail = Auth::user()->mail;
        $request->validate(
            [
                'username' => ['required', 'string', 'min:4', 'max:12'],
                'mail' => ['required', 'email', 'min:4', 'max:50', Rule::unique('users', 'mail')->ignore($auth_mail, 'mail')],
                'password' => ['string', 'min:4', 'max:12'],
                'inputPassword' => ['string', 'min:4', 'max:12'],
            ],
            [
                'username.required' => '名前は必須項目です',
                'username.min' => '4文字以上で入力してください',
                'username.max' => '50文字以下で入力してください',
                'mail.required' => 'メールは必須項目です',
                'mail.email' => 'Eメールを入力してください',
                'mail.min' => '４文字以上で入力してください',
                'mail.max' => '225文字以内で入力してください',
                'inputPassword.min' => '４文字以上で入力してください',
                'inputPassword.max' => '１２文字以内で入力してください',
            ]
        );
        $username = $request->username;
        $mail = $request->mail;
        $bio = $request->inputBio;

        if (request('inputPassword')) {
            $inputPassword = bcrypt($request->inputPassword);
        } else {
            $inputPassword = DB::table('users')
                ->where('id', Auth::id())
                ->value('password');
        }

        if (request('image')) {
            $imagename = $request->file('image')->getClientOriginalName();
            $request->file('image')->storeAs('/public/images', $imagename);
        } else {
            $imagename = DB::table('users')
                ->where('id', Auth::id())
                ->value('images');
        }
        DB::table('users')
            ->where('id', Auth::id())
            ->update([
                'username' => $username,
                'mail' => $mail,
                'password' => $inputPassword,
                'bio' => $bio,
                'images' => $imagename,
            ]);
        return back();
    }

    public function anotherprofile($id)
    {
        $auth = Auth::user();
        $follow_count = DB::table('follows')
            ->where('follower', Auth::id())
            ->count();
        $follower_count = DB::table('follows')
            ->where('follow', Auth::id())
            ->count();
        $posts = DB::table('posts')
            ->join('users', 'posts.user_id', '=', 'users.id')
            ->where('users.id', $id)
            ->select('users.username', 'users.images', 'posts.posts', 'posts.created_at', 'users.id', 'users.bio')
            ->orderBy('posts.created_at', 'desc')
            ->get();
        $user = DB::table('users')
            ->where('id', $id)
            ->first();
        $follow_list = DB::table('follows')
            ->where('follower', Auth::id())
            ->get();
        return view('users.anotherprofile', compact('auth', 'follow_count', 'follower_count', 'posts', 'user', 'follow_list'));
    }

    public function search(Request $request)
    {
        $auth = Auth::user();
        $follow_count = DB::table('follows')
            ->where('follower', Auth::id())
            ->count();
        $follower_count = DB::table('follows')
            ->where('follow', Auth::id())
            ->count();

        $follow_list = DB::table('follows')
            ->where('follower', Auth::id())
            ->get();

        $keyword = $request->search;

        if (request('search')) {

            $users = DB::table('users')
                ->where('username', 'like', "%" . $keyword . "%")
                ->where('id', '<>', Auth::id())
                ->get();
        } else {
            $users = DB::table('users')
                ->where('id', '<>', Auth::id())
                ->get();
        }
        return view('users.search', compact(
            'users',
            'auth',
            'follow_count',
            'follower_count',
            'follow_list',
            'keyword'
        ));
    }
}
