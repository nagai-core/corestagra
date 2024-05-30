<?php

namespace App\Http\Controllers;

use App\Models\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class ImageController extends Controller
{
    public function index() {
        $images = Image::select("id", "url", "favorite", "comment")
        ->get();
        return view('index', compact('images'));
    }

    public function upload(Request $request) {
        $request->validate([
            'image' => ['required', 'mimes:jpg,jpeg,png,gif,webp']
        ]);
        $new_images = new Image();
        $userId = Auth::id();
        $path = $request->image->store('images', 'public');
        $new_images->url = $path;
        $new_images->comment = $request->comment;
        $new_images->favorite = 0;
        $new_images->user_id =$userId;
        $new_images->save();
        //dd($path);
        return redirect()->route('index');
    }

}
