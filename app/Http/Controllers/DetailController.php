<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;
use App\Models\Image;
use Illuminate\Support\Facades\Auth;

class DetailController extends Controller
{
    public function show($id){
        $image = Image::find($id);
        $userId = Auth::id();
        // foreach($image->users as $user){

        // }
        return view('detail.show',compact('image','userId'));
    }

    public function store($id,Request $request){
        $image = Image::find($id);
        $userId = Auth::id();
        $new_contact = new Comment();

        /* リクエストで渡された値を設定する */
        $new_contact->comment = $request->comment;
        $new_contact->user_id = $request->user_id;
        $new_contact->images_id = $request->images_id;
        $new_contact->delete_flg = 0;
        /* データベースに保存 */
        $new_contact->save();

        /* 完了画面を表示する */
        return view('detail.show',compact('image','userId'));
    }

    public function delete(Request $request){
        $image_to_delete = Image::find($request->image_id);
        $image_to_delete->delete();
        return redirect('/');
    }
}
