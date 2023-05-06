<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use DB;

class PostsController extends Controller
{

    public function index()
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
            ->select('posts.id', 'users.username', 'users.images', 'posts.posts', 'posts.created_at as created_at', 'posts.user_id')
            ->orderBy('posts.created_at', 'desc')
            ->get();
        return view('posts.index', compact('auth', 'follow_count', 'follower_count', 'posts'));
    }

    public function create(Request $request)
    {
        $request->validate([
            'Post' => 'required|string|max:1150'
        ], [
            'Post.required' => '投稿が入力されていません',
            'Post.max' => '1150文字以内で入力してください'
        ]);
        $post = $request->input('Post');
        DB::table('posts')->insert([
            'posts' => $post,
            'user_id' => Auth::id(),
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        return redirect('/top');
    }

    public function update(Request $request)
    {
        $id = $request->input('id');
        $up_post = $request->input('upPost');
        DB::table('posts')
            ->where('id', $id)
            ->update(
                ['posts' => $up_post]
            );
        return redirect('/top');
    }

    public function destroy($id)
    {
        DB::table('posts')
            ->where('id', $id)
            ->delete();
        return redirect('/top');
    }
}
