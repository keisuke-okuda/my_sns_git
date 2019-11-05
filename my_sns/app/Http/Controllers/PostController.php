<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use App\post;
use Illuminate\Support\Facades\Input;

class PostController extends Controller
{
    
    public function store () 
    {   
        //Ajax送信されてきた値
        $post    = Input::get('post');
        //ログインしているユーザーのID取得
        $user_id = Auth::user()->id;
        //TODO formを作成してフォームから送信された値をDBに登録するようにする
        $post = Post::create([
            'text'       => $post,
            'user_id'    => $user_id,
            'created_at' => carbon::now(),
            'updated_at' => carbon::now()
            ]);      
    }

}
