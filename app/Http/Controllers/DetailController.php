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
        return view('detail.show',compact('image'));
    }

    public function store($id, Request $request){
        $image = Image::find($id);
        $userId = Auth::id();
        $new_contact = new Comment();

        /* リクエストで渡された値を設定する */
        $new_contact->name = $request->name;
        $new_contact->comment = $request->comment;
        $new_contact->user_id = $userId;
        $new_contact->images_id = $image->images_id;

        /* データベースに保存 */
        $new_contact->save();

        /* 完了画面を表示する */
        return redirect('/index');

    }

}
