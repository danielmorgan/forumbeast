<?php

namespace App\Http\Controllers;

use App\Reply;
use App\Thread;
use Illuminate\Http\Request;

class RepliesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function store(Request $request, Thread $thread)
    {
        $thread->addReply(new Reply([
            'body'    => $request->body,
            'user_id' => auth()->id(),
        ]));

        return back();
    }
}
