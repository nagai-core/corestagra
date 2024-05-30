<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function index(){
        return view('signUp.index');
    }

    public function show(Request $request){
        // $request->validate([
        //     'icons' => ['required', 'mimes:jpg,jpeg,png,gif,webp']
        // ]);
        // $icon_path = $request->icon->store('icons', 'public');
        return view('signUp.confirm',compact('request'));
    }

    public function store(Request $request){
        $new_contact = new User();
        // $request->validate([
        //     'icons' => ['required', 'mimes:jpg,jpeg,png,gif,webp']
        // ]);
        // $icon_path = $request->icon->store('icons', 'public');

        /* リクエストで渡された値を設定する */
        $new_contact->name = $request->name;
        $new_contact->email = $request->email;
        $new_contact->password = $request->password;
        $new_contact->url = "images/test.jpg";
        /* データベースに保存 */
        $new_contact->save();

        /* 完了画面を表示する */
        return redirect('/complete');
    }
}
