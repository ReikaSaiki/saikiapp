<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

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

            if(isset($request->profile_image)){
            // 拡張子つきでファイル名を取得
        $imageName = $request->file('profile_image')->getClientOriginalName();

        // 拡張子のみ
        $extension = $request->file('profile_image')->getClientOriginalExtension();

        // 新しいファイル名を生成（形式：元のファイル名_ランダムの英数字.拡張子）
        $newImageName = pathinfo($imageName, PATHINFO_FILENAME) . "_" . uniqid() . "." . $extension;

        $request->file('profile_image')->move(public_path() . "/storage/tmp", $newImageName);
        $image = "/storage/tmp/" . $newImageName;
            }
            else{
                $image='';
                $newImageName='';
            }

            $id=Auth::id();
            $user=User::find($id);
            //$user=Auth::user();
            $img=$user->profile_image;

            return view('profileconfirm',
                ['profile'=>$profile,
                'profile_image'=> $image,
                'newImageName' => $newImageName,
                'img'=>$img]);
        }


        public function updateprofile(Request $request)  
        {  
            
            $id=Auth::id();
            $user=User::find($id);
            //$user=Auth::user();

            $user->name= $request->name;
            $user->profile = $request->profile;

if(!empty($request->newImageName)){
            $user->profile_image = $request->newImageName;
        // 一時保存から本番の格納場所へ移動
        rename(public_path() . "/storage/tmp/" . $request->newImageName, public_path() . "/storage/"  . $request->newImageName);
        
        // 一時保存の画像を削除
        \File::cleanDirectory(public_path() . "/storage/tmp");
}

        $user->save();

         return redirect(route('user.profile',$id));
        }
  
}
