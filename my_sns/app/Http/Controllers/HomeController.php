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
        $user_id    = Auth::user()->id;
        //ログインしているユーザーのpostを取得        
        $user_posts = Post::where('user_id', $user_id)->latest()->get();

        return view('home')->with('user_posts', $user_posts);
    }
}
