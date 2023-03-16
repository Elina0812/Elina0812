<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\DB;


class FollowsController extends Controller
{
    //
    public function followList()
    {
        $auth = Auth::user();
        $follow_count = DB::table('follows')
            ->where('follower', Auth::id())
            ->count();
        $follower_count = DB::table('follows')
            ->where('follow', Auth::id())
            ->count();

        $latestPosts = DB::table('posts')
            ->join('follows', 'posts.user_id', '=', 'follows.follow')
            ->join('users', 'posts.user_id', '=', 'users.id')
            ->where('follow', Auth::id())
            ->get();

        $users = DB::table('users')
            ->join('follows', 'users.id', '=', 'follows.follow')
            ->where('follow', Auth::id())
            ->get();

        return view('follows.followList', compact('auth', 'follow_count', 'follower_count', 'latestPosts', 'users'));
    }
    public function followerList()
    {
        $auth = Auth::user();
        $follow_count = DB::table('follows')
            ->where('follower', Auth::id())
            ->count();
        $follower_count = DB::table('follows')
            ->where('follow', Auth::id())
            ->count();

        $latestPosts = DB::table('posts')
            ->join('follows', 'posts.user_id', '=', 'follows.follow')
            ->join('users', 'posts.user_id', '=', 'users.id')
            ->where('follower', Auth::id())
            ->get();

        $users = DB::table('users')
            ->join('follows', 'users.id', '=', 'follows.follow')
            ->where('follower', Auth::id())
            ->get();


        return view('follows.followerList', compact('auth', 'follow_count', 'follower_count', 'latestPosts', 'users'));
    }
    public function index()
    {
        $auth = Auth::follow();
        return view('follows.index', compact('auth'));
    }
}
