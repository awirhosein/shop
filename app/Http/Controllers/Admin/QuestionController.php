<?php

namespace App\Http\Controllers\Admin;

use App\Models\Question;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class QuestionController extends Controller
{
    public function index()
    {
        $questions = Question::latest()->paginate(config('custom.per_page'));

        return view('admin.pages.questions.index', compact('questions'), [
            'fields' => ['User', 'Product', 'Text', 'Type', 'Status']
        ]);
    }

    public function edit(Question $question)
    {
        return view('admin.pages.questions.edit', compact('question'));
    }

    public function update(Request $request, Question $question)
    {
        $validated = $request->validate([
            'text' => ['required'],
            'status' => ['nullable']
        ]);

        if ($request->status == 'approved' && !$question->approved_at) {
            $validated['approved_at'] = now();
        }

        $question->update($validated);

        toast(__('msg.success.update'), 'success');

        return redirect_back('admin.questions.index');
    }

    public function destroy(Question $question)
    {
        $question->delete();

        toast(__('msg.success.delete'), 'success');

        return redirect()->back();
    }
}
