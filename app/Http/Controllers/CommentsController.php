<?php

namespace App\Http\Controllers;

use App\Article;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class CommentsController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return Response
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request, Article $article)
    {
        $this->validate($request, ['comment' => 'required|string']);

        $article->comments()->create($request->only('comment'));

        return response()->json(['status' => 'success', 'message' => 'Comment added successfully.']);
    }
}
