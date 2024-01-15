<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

use App\Event;

use App\User;

class RegistrationController extends Controller
{
    public function eventform(){
        return view('eventform');
    }

    public function eventconfirm(Request $request){

        $request->validate([
            'title' => 'required',
            'date' => 'required',
            'contents'  => 'required',
            'type_flg' => 'required',
            'fee'  => 'required',
        ]);

        $details = $request->all();
        
        return view('eventconfirm',[
            'details'=>$details
        ]);
    }

    public function eventregister(Request $request){

        $event = new Event;
        $id=Auth::id();
        $event->user_id=$id;
        $event->name = $request->title;
        $event->date = $request->date;
        $event->contents = $request->contents;
        $event->type_flg = $request->type_flg;
        $event->capacity = $request->capacity;
        $event->fee = $request->fee;
        $event->link = $request->link;

        $event->save();

        return view('eventregister');
    }

    public function editprofile(){

            return view('editprofile');
        }


        public function confirmprofile(Request $request){

            $request->validate([
                'name'=> 'required',
                'profile' => 'required',
                'profile_image' => ['image','mimes:jpeg,png,jpg,gif'],
            ]);
    
            $profile = $request->all();
            // $img = $request->file('profile_image');

            return view('profileconfirm',[
                'profile'=>$profile,
                // 'img'=>$img
            ]);
        }


        public function updateprofile(Request $request)  
        {  
            
            $id=Auth::id();
            $user=User::find($id);
            //$user=Auth::user();
            $user->name= $request->name;
            $user->profile = $request->profile;

            // $file_name = $request->profile_image->getClientOriginalName();
            // $img = $request->profile_image->storeAs('public', $file_name );

        //     // 画像フォームでリクエストした画像を取得
        //     $img = $request->file('profile_image');
        //     // storage > public > img配下に画像が保存される
        //     $path = $img->store('img','public');
        //     // 画像情報がセットされていれば、保存処理を実行
        //     if (isset($img)) {
        //     // storage > public > img配下に画像が保存される
        //     $path = $img->store('img','public');
        //     // store処理が実行できたらDBに保存処理を実行
        //     if ($path) {
        //     // DBに登録する処理
        //     User::create([
        //         'profile_image' => $path,
        //     ]);}
        // }

            // $img=$request->profile_image->getClientOriginalName();
            //  //getClientOriginalNameでオリジナルの名前が取れる。
            // $img=$request->profile_image->storeAs('',$filename,'public'); 
            // //storeAsメソッドを追加して引数に上で取得したオリジナル名を入れる
            // $user->profile_image=$img;

            $user->save();
    
         return redirect(route('user.profile',$id));
        }
  
}
