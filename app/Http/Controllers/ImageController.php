<?php

namespace App\Http\Controllers;

use App\Models\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class ImageController extends Controller
{
    public function index() {
        $id = 0;
        $user = null;
        $id = Auth::id();
        if($id) {
            $user = Auth::user()->name;
        }
        // dd($user);
        $images = Image::select("id", "url", "favorite", "comment")
        ->get();
        $query=Image::query();
        $query->orderBy('created_at', 'desc');
        $images = $query->get();
        return view('index', compact('images', 'id', 'user'));
    }

    public function upload(Request $request) {
        $request->validate([
            'image' => ['required', 'mimes:jpg,jpeg,png,gif,webp']
        ]);
        $new_images = new Image();
        $id = Auth::id();
        $path = $request->image->store('images', 'public');
        $new_images->url = $path;
        $new_images->comment = $request->comment;
        $new_images->favorite = 0;
        $new_images->user_id =$id;
        $new_images->save();

        $user = Auth::user()->name;
        $images = Image::select("id", "url", "favorite", "comment")
        ->get();
        $query=Image::query();
        $query->orderBy('created_at', 'desc');
        $images = $query->get();
        // return redirect()->route('index');
        return view('index', compact('images', 'id', 'user'));
    }

    public function search(Request $request){
        $id = 0;
        $user = null;
        $id = Auth::id();
        if($id) {
            $user = Auth::user()->name;
        }
        $keys = explode(" ",$request->keyword);
        $i=0;
        $query=Image::query();
        $images = Image::select("id", "url", "favorite")
        ->get();
        $query->orderBy('created_at', 'desc');
        foreach($keys as $key){
            if($i === 0){
            $query->where("comment","LIKE","%{$key}%");
            }else{
            $query->orWhere("comment","LIKE","%{$key}%");
            }
            $i++;
        }
        $searches = $query->get();

        return view("index",compact("searches","images", "id", 'user'));
    }

    // public function sort(Request $request){
    //     function order($select)
    //     {
    //         $query=Image::query();
    //         if($select == 'asc'){
    //             return $query->orderBy('created_at', 'asc')->get();
    //         } elseif($select == 'desc') {
    //             return $query->orderBy('created_at', 'desc')->get();
    //         } else {
    //             return $query->all();
    //         }
    //     }
    //     $images = Image::select("id", "url", "favorite", "comment");
    //     return view('index', ['posts' => order($request->sort)], compact('images'));
    // }
}
