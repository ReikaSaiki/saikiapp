<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

use App\Event;

use App\User;

use App\Like;


class DisplayController extends Controller
{
    // public function index(){
    //     $auths = Auth::user();
    //     return view('index',['auths'=> $auths]);
    // }

    public function index(){
        $events = new Event;
        $allevents = $events->all()->toArray();

        return view('index',
        ['events'=>$allevents]
        );
    }

    public function eventdetail($eventid){
        $events = new Event;
        $allevents = $events->where('id','=',$eventid)->get()->toArray();

        $like_model = new Like;

        return view('eventdetail',
        ['events'=> $allevents],
        ['like_model'=>$like_model]);
    }

    
    public function userprofile(Request $request){
        $user = Auth::user();

        $likes = $user->like_events()->get()->toArray();

        return view('userprofile',
         ['user' => $user], 
         ['likes'=>$likes]);

            // $users->user_id=$id;
    
        //userの全情報を抽出
        // Auth::user();

        //userのidをとってくるなら
        //Auth::id();

        // return view('userprofile');
    }


    public function ajaxlike(Request $request)
    {
        $user_id = Auth::user()->id;
        $event_id = $request->event_id;
        $like = new Like;
        $event = Event::findOrFail($event_id);

        // 空でない（既にいいねしている）なら
        if ($like->like_exist($user_id, $event_id)) {
            //likesテーブルのレコードを削除
            $like = Like::where('event_id', $event_id)->where('user_id', $user_id)->delete();
        } else {
            //空（まだ「いいね」していない）ならlikesテーブルに新しいレコードを作成する
            $like = new Like;
            $like->event_id = $request->event_id;
            $like->user_id = Auth::user()->id;
            $like->save();
        }

        //loadCountとすればリレーションの数を○○_countという形で取得できる（今回の場合はいいねの総数）
        $eventLikesCount = $event->loadCount('likes')->likes_count;

        //一つの変数にajaxに渡す値をまとめる
        //今回ぐらい少ない時は別にまとめなくてもいいけど一応。笑
        $json = [
            'eventLikesCount' => $eventLikesCount,
        ];
        //下記の記述でajaxに引数の値を返す
        return response()->json($json);
    }


}

