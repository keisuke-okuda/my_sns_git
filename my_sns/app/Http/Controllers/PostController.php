<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use App\post;

class PostController extends Controller
{
    
    public function store (request $request) 
    {   
        //ログインしているユーザーのID取得
        $user_id    = Auth::user()->id;
        //TODO formを作成してフォームから送信された値をDBに登録するようにする
        $post = Post::create([
            'text'       => $request->text,
            'user_id'    => $user_id ,
            'created_at' => carbon::now(),
            'updated_at' => carbon::now()
            ]);

            if ($post) {
                return redirect('/home')->with('flash_message', '投稿しました');
            } else {
                return redirect('/home')->with('flash_message', '投稿しました');
            }        
    }

}
