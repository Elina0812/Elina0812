<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class FollowsController extends Controller
{
    //
    public function followList()
    {
        return view('follows.followList');
    }
    public function followerList()
    {
        return view('follows.followerList');
    }
    public function index()
    {
        $auth = Auth::follow();
        return view('follows.index', compact('auth'));
    }
}
