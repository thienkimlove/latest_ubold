<?php

namespace App\Http\Controllers;

use App\Http\Requests\QuestionRequest;
use App\Models\Question;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;

class QuestionsController extends Controller
{

    public function index()
    {
        return view('questions.index');
    }

    public function create()
    {
        return view('questions.create');
    }

    public function store(QuestionRequest $request)
    {
        $request->store();

        flash()->success('Success!', 'Question successfully created.');

        return redirect()->route('questions.index');
    }

    public function edit($id)
    {
        $question = Question::find($id);

        if (! $question) {
            throw new ModelNotFoundException('Question not found.');
        }

        return view('questions.edit', compact('question'));
    }

    public function update(QuestionRequest $request, $id)
    {
        $request->save($id);

        flash()->success('Thành công', 'Cập nhật thành công!');

        return redirect()->route('questions.index');
    }

    public function dataTables(Request $request)
    {
        return Question::getDatatables($request);
    }

}