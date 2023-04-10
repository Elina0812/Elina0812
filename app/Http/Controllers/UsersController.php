<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Auth;
use DB;

class UsersController extends Controller
{
    //
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
        // dd($users);

        return view('users.profile', compact('auth', 'follow_count', 'follower_count', 'posts', 'users'));
    }



    public function update(Request $request)
    {
        $username = $request->inputName;
        $mail = $request->inputEmail;
        $bio = $request->inputBio;

        if (request('inputPassword')) {
            $newpassword = bcrypt($request->inputPassword);
        } else {
            $newpassword = DB::table('users')
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
                'password' => $newpassword,
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
        $posts = DB::table('posts')->get();
        $user = DB::table('users')
            ->where('id', $id)
            ->select('users.username', 'users.bio', 'users.id', 'users.images')
            ->first();
        $follow_list = DB::table('follows')
            ->where('follower', Auth::id())
            ->get();
        // dd($users);

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
        // dd($follow_list);
        if (request('search')) {
            $keyword = $request->search;
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
            'follow_list'
        ));
    }
}
