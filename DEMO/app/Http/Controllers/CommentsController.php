<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\comment;

class CommentsController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware('guest');
    // }


    public function store(Request $request)
    {
        // dd();
        $this->validate($request, [
            'body' => 'required',
            'food_id' => ['required','numeric', 'min:1'],
        ]);
        $comment = new comment;
        $comment->body = $request->body;
        $comment->user_id = auth()->user()->id;
        $comment->food_id = $request->food_id;
        $comment->save();
        return back()->with('success','New Comment Added');
    }
}
