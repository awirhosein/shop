<?php

namespace App\Http\Controllers\Admin\Questions;

use App\Models\Question;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AnswerController extends Controller
{
    public function index(Question $question)
    {
        $answers = $question->answers()->latest()->paginate(config('custom.per_page'));

        return view('admin.pages.questions.answers.index', compact('answers', 'question'), [
            'fields' => ['User', 'Text', 'Date', '']
        ]);
    }

    public function create(Question $question)
    {
        return view('admin.pages.questions.answers.create', compact('question'));
    }

    public function store(Request $request, Question $question)
    {
        $request->validate(['text' => 'required']);

        auth()->user()->questions()->create([
            'product_id' => $question->product_id,
            'parent_id' => $question->id,
            'text' => $request->text,
            'approved_at' => now(),
        ]);

        toast(__('msg.success.create'), 'success');

        return redirect()->route('admin.questions.answers.index', $question);
    }

    public function edit(Question $question, Question $answer)
    {
        return view('admin.pages.questions.answers.edit', compact('question', 'answer'));
    }

    public function update(Request $request, Question $question, Question $answer)
    {
        $validated = $request->validate(['text' => 'required']);

        if ($request->status == 'approved') {
            $validated['approved_at'] = now();
        }

        $answer->update($validated);

        toast(__('msg.success.update'), 'success');

        return redirect()->route('admin.questions.answers.index', $question);
    }

    public function destroy(Question $question, Question $answer)
    {
        $question->answers()->whereId($answer->id)->delete();

        toast(__('msg.success.delete'), 'success');

        return redirect()->back();
    }
}
