<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Comment;
use DB;

class CommentsController extends Controller
{
    public function store_comment(Request $request){



        $this->validate($request, [
            'content' => 'required|max:255',
        ]);


        $comment = new Comment;

        $comment->nick_name = $request->nick_name;
        $comment->document_srl = $request->document_srl;
        $comment->module_srl = $request->module_srl;
        $comment->content = $request->content;

        $comment->save();

        return redirect()->back();
    }
}
