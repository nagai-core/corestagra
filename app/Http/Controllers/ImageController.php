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
    public function search(Request $request){
        $keyword = $request->input("keyword");
        $query = Image::query();
       if (!empty($keyword)){
        $query->where("comment","LIKE","%{$keyword}%");
       $images = $query->get();
       return view("images.index",compact("images","keyword"));
    }
    }
}
