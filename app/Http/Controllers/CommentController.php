<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function edit($id) {
        $comment = Comment::where('id', $id)
        ->select("comment", "user_id", "delete_flg")
        ->first();
        if($comment->user_id != Auth::id() || $comment->delete_flg === 1) {
            return redirect()->route("index");
        }
        return view('comment.edit.index', compact('comment', 'id'));
    }

    public function update(Request $request, $id) {
        $validated = $request->validate([
            "comment" => ["required"]
        ]);
        $newComment = Comment::find($id);
        $newComment->comment = $request->comment;
        $newComment->save();
        return redirect()->route("index");
    }

    public function destroy($id) {
        $newComment = Comment::find($id);
        $newComment->delete_flg = 1;
        $newComment->save();
        return redirect()->route("index");
    }

}
