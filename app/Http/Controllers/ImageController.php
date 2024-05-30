<?php

namespace App\Http\Controllers;

use App\Models\Image;
use Illuminate\Http\Request;

class ImageController extends Controller
{
    public function index() {
        $images = Image::select("id", "url", "favorite")
        ->get();
        return view('index', compact('images'));
    }

    public function upload(Request $request) {
        $request->validate([
            'image' => ['required', 'mimes:jpg,jpeg,png,gif,webp']
        ]);
        $path = $request->image->store('images', 'public');
        dd($path);
        return view('index');
    }
    // public function search(Request $request){

    //    if (!empty($request->keyword)){
    //         $images=Image::where("comment","LIKE","%{$request->keyword}%")->get();
    //        }else{
    //         $images = Image::select("id", "url", "favorite")
    //         ->get();
    //    }
    //    return view("index",compact("images"));
    // }
    public function search(Request $request){
        $keys = explode(" ",$request->keyword);
        $i=0;
        $query=Image::query();
        $images = Image::select("id", "url", "favorite")
        ->get();
        foreach($keys as $key){
          if($i === 0){
            $query->where("comment","LIKE","%{$key}%");
          }else{
            $query->orWhere("comment","LIKE","%{$key}%");
          }
            $i++;
        }
        $searches = $query->get();
        return view("index",compact("searches","images"));
    }
}
