<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Comment;
use App\User;
use DB;
use Carbon\Carbon;

class CommentsController extends Controller
{
    public function store_comment(Request $request)
    {
        $this->validate($request, [
            'body' => 'required|max:255'
        ]);

        $comment = new Comment;
        $comment->document_srl = $request->document_srl;
        $comment->module_srl = $request->module_srl;
        $comment->nick_name = auth()->user()->name;
        $comment->user_name = auth()->user()->username;
        $comment->member_srl = auth()->user()->id;
        $comment->email_address = auth()->user()->email;
        $comment->ipaddress = $request->ip();
        $comment->content = $request->body;
        $comment->save();

        return redirect()->back();
    }

    public function edit($id)
    {
        $comment = Comment::find($id);

        if (!isset(auth()->user()->id)) {
            return Redirect('/login');
        } else {
            if (auth()->user()->id != $comment->member_srl) {
                return abort(404);
            } else {
                return view('comments.comment-edit', compact('comment'));
            }
        }
    }

    public function update(Request $request)
    {
        $id = $request->input('comment_id');
        $this->validate($request, [
            'body' => 'required'
        ]);
        $comment = Comment::findOrFail($id);
        $comment->nick_name = auth()->user()->name;
        $comment->user_name = auth()->user()->username;
        $comment->member_srl = auth()->user()->id;
        $comment->email_address = auth()->user()->email;;
        $comment->ipaddress = $request->ip();
        $comment->content = $request->body;
        $comment->save();

        return redirect()->back();
    }

    public function destroy(Request $request)
    {
        $id = $request->input('comment_id');
        $comment = Comment::findOrFail($id);

        if (!Auth::user()) {
            return Redirect('/login');
        } else {
            if (auth()->user()->id != $comment->member_srl) {
                return abort(404);
            } else {
                $comment->delete();
                return redirect()->back();
            }
        }
    }
}
