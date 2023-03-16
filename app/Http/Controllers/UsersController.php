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
        return view('users.profile');
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
        return view('users.search', ['users' => $users, 'auth' => $auth, 'follow_count' => $follow_count, 'follower_count' => $follower_count]);
    }
}
