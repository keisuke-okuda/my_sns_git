<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Log;
use Carbon\Carbon;
use App\user;
use App\follow;

class FollowController extends Controller
{
    public function index () 
    {   
        $login_user_id = Auth::user()->id;
        $users = User::select(
            'users.id as user_table_id', 
            'users.name as name',
            'follows.id as follow_table_id',
            'follows.user_id as follow_user_id',
            'follows.follow_id as follow_id',
            'follows.follow_flag as follow_flag'
            )
        ->leftjoin('follows', 'users.id', '=', 'follows.follow_id')
        ->get();

        return view('follow.index')
        ->with([
            'users'   => $users, 
            'login_user_id' => $login_user_id
            ]); 
    }

    //userがフォローした時の処理
    public function store (Request $request) 
    {     
        log::debug($request->all());
        //Ajax送信されてきた値
        $follow_id     = $request->follow_id;
        $input_id      = $request->input_id;
        $login_user_id = Auth::user()->id;
        
            if($input_id == "follow"){   
                Log::info('------Follow');      
                
                $follow_exists_or_not = Follow::where('user_id', $login_user_id)
                ->where('follow_id', $follow_id)
                ->first();

                if($follow_exists_or_not ){
                    Log::info('------データがある'); 
                    $follow_exists_or_not = Follow::where('user_id', $login_user_id)
                    ->where('follow_id', $follow_id)
                    ->update(['follow_flag' => 1]);

                } else {
                    Follow::create([            
                        'user_id'     => $login_user_id,
                        'follow_id'   => $follow_id,
                        'follow_flag' => 1,
                        'created_at'  => carbon::now(),
                        'updated_at'  => carbon::now()
                        ]);  

                }
            } elseif ($input_id == "remove") {
                Log::info('------Followを外します');   
                Follow::where('id', $request->follow_id)
                ->update(['follow_flag' => 0]);
                
            }
    }
}
