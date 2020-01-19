<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\post;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        //ログインしているユーザーのID取得
        $login_user_id = Auth::user()->id;
        //ログインしているユーザーとフォローしているユーザーのpostを取得     
        $posts = Post::distinct()->
        select(
            'posts.id as post_id',
            'posts.text as text',
            'users.id as user_id',
            'users.name as username'
        )->leftjoin('follows', 'posts.user_id', '=', 'follows.follow_id')
        ->leftjoin('users', 'users.id', '=', 'posts.user_id')
        ->Where('follows.user_id', '=', $login_user_id)
        ->Where('follows.follow_flag', '=', 1)
        ->orWhere('posts.user_id', '=', $login_user_id)
        ->orderBy('post_id')
        ->get();

        return view('home')->with([
            'posts' => $posts,
            'login_user_id' => $login_user_id 
        ]);
    }
}
