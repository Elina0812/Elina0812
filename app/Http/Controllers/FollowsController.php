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
            ->select('users.id', 'users.username', 'users.images', 'posts.posts', 'posts.created_at as created_at')
            ->get();

        $users = DB::table('users')
            ->join('follows', 'users.id', '=', 'follows.follow')
            ->where('follower', Auth::id())
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
            ->where('follow', Auth::id())
            ->select('users.id', 'users.images', 'users.username', 'posts.posts', 'posts.created_at as created_at')
            ->get();

        $users = DB::table('users')
            ->join('follows', 'users.id', '=', 'follows.follow')
            ->where('follow', Auth::id())
            ->get();


        return view('follows.followerList', compact('auth', 'follow_count', 'follower_count', 'latestPosts', 'users'));
    }

    public function index()
    {
        $auth = Auth::follow();
        return view('follows.index', compact('auth'));
    }

    public function create(Request $request)
    {
        $id = $request->id;
        DB::table('follows')
            ->insert([
                'follow' => $id,
                'follower' => Auth::id(),
                'created_at' => now(),
            ]);
        return back();
    }

    public function destroy(Request $request)
    {
        $id = $request->id;
        DB::table('follows')
            ->where([
                'follow' => $id,
                'follower' => Auth::id(),
            ])->delete();
        return back();
    }
}
