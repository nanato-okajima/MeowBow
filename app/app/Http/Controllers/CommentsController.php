<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;
use App\Http\Requests\CreateCommentRequest;

class CommentsController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateCommentRequest $request, Comment $comment)
    {
        $user = auth()->user();
        $data = $request->all();
        $comment->commentStore($user->id, $data);

        return back();
    }
}
