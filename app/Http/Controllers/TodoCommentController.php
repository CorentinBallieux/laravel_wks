<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Todo;
use Illuminate\Http\Request;

class TodoCommentController extends Controller
{
    public function store(Request $request, Todo $todo)
    {
        $comment = new Comment();
        $comment->todo_id = $todo->id;
        $comment->content = $request->input('content');
        $comment->save();

        return redirect()->back();
    }

    public function destroy(Todo $todo, Comment $comment) {
        $comment->delete();

        return redirect()->back();
    }
}
