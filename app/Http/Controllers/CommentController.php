<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function edit($imageId, $commentId) {
        $comment = Comment::where('id', $commentId)
        ->select("comment", "user_id", "delete_flg")
        ->first();
        if($comment->user_id != Auth::id() || $comment->delete_flg === 1) {
            return redirect()->route("index");
        }
        return view('comment.edit.index', compact('comment', 'imageId', 'commentId'));
    }

    public function update(Request $request, $imageId, $commentId) {
        $validated = $request->validate([
            "comment" => ["required"]
        ]);
        $newComment = Comment::find($imageId);
        $newComment->comment = $request->comment;
        $newComment->save();
        return redirect()->route("index");
    }

    public function destroy($imageId, $commentId) {
        $newComment = Comment::find($commentId);
        $newComment->delete_flg = 1;
        $newComment->save();
        return redirect()->route("index");
    }

}
