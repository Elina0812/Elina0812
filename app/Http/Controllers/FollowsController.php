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

        return view('follows.followList');
    }
    public function followerList()
    {
        $latestPosts = DB::table('posts')
            ->select('user.id', DB::raw('MAX(created_at) as post.created_at'))
            ->where('follower', Auth::id())
            ->groupBy('user.id');

        $users = DB::table('users')
            ->joinSub($latestPosts, 'latest_posts', function ($join) {
                $join->on('users.id', '=', 'latest_posts.user.id');
            })->get();
        return view('follows.followerList');
    }
    public function index()
    {
        $auth = Auth::follow();
        return view('follows.index', compact('auth'));
    }
}
