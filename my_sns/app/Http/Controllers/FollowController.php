<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Carbon\Carbon;
use App\user;
use App\follow;

class FollowController extends Controller
{
    public function index () 
    {
        $login_user_id = Auth::user()->id;
        $users = User::get();
        dump($users);

        return view('follow.index')->with('users', $users); 
    }

    //userがフォローした時の処理
    public function store () 
    {     
        //Ajax送信されてきた値
        $follow_id  = Input::get('follow');

        $login_user_id = Auth::user()->id;

        $Follow = Follow::create([            
            'user_id'    => $login_user_id,
            'follow_id'  => $follow_id,
            'created_at' => carbon::now(),
            'updated_at' => carbon::now()
            ]);    


    }
}
