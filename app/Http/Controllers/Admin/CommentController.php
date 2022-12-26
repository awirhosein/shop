<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Comment;

class CommentController extends Controller
{
    public function index()
    {
        $comments = Comment::latest()->paginate(config('custom.per_page'));

        return view('admin.pages.comments.index', compact('comments'), [
            'fields' => ['User', 'Product', 'Text', 'Status']
        ]);
    }

    public function edit(Comment $comment)
    {
        return view('admin.pages.comments.edit', compact('comment'));
    }

    public function update(Request $request, Comment $comment)
    {
        $validated = $request->validate([
            'text' => ['required'],
            'status' => ['required']
        ]);

        if ($request->status == 'approved' && !$comment->approved_at) {
            $validated['approved_at'] = now();
        }

        $comment->update($validated);

        toast(__('msg.success.update'), 'success');

        return redirect_back('admin.comments.index');
    }

    public function destroy(Comment $comment)
    {
        $comment->delete();

        toast(__('msg.success.delete'), 'success');

        return redirect()->back();
    }
}
