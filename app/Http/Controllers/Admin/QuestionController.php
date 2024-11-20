<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Question;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class QuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $index['questions'] = Question::with('answers')->latest()->paginate(10);
        return view('admin.questions.index', $index);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $index['questions'] = Question::latest()->get();
        return view('admin.questions.create', $index);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'question' => 'required|min:3',
            'answers' => 'required|min:1',
            'answers.*.input' => 'required',
        ]);

        DB::beginTransaction();
        try {

            $question = Question::create([
                'question' => $request->question,
            ]);

            if ($request->answers) {
                foreach ($request->answers as $answer) {
                    $question->answers()->create([
                        'answer' => $answer['input'],
                    ]);
                }
            }

            DB::commit();

            return redirect()->route('question.index')->with('success', 'Question created successfully.');
        } catch (Exception $e) {
            DB::rollBack();
            Log::error('Error creating question: ' . $e->getMessage(), [$e]);
            return redirect()->back()->withErrors(['title' => $e->getMessage()])->withInput();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $index['question'] = Question::with('answers')->findOrFail($id);
        return view('admin.questions.edit', $index);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // dd($request->all());
        $request->validate([
            'question' => 'required|min:3',
            'answers' => 'required|min:1',
            'answers.*.input' => 'required',
        ]);

        DB::beginTransaction();
        try {

            $question = Question::findOrFail($id);

            $question->update([
                'question' => $request->question,
            ]);

            if ($request->answers) {
                $question->answers()->whereNotIn('id', array_column($request->answers, 'id'))->delete();

                foreach ($request->answers as $answer) {
                    if (isset($answer['id'])) {
                        $question->answers()->where('id', $answer['id'])->update([
                            'answer' => $answer['input'],
                        ]);
                    } else {
                        $question->answers()->create([
                            'answer' => $answer['input'],
                        ]);
                    }
                }
            } else {
                $question->answers()->delete();
            }

            DB::commit();

            return redirect()->route('question.index')->with('success', 'Question created successfully.');
        } catch (Exception $e) {
            DB::rollBack();
            Log::error('Error creating question: ' . $e->getMessage(), [$e]);
            return redirect()->back()->withErrors(['title' => $e->getMessage()])->withInput();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $question = Question::with('templates')->findOrFail($id);

        if ($question->templates->count()) {
            return redirect()->route('question.index')->with('error', 'Unable to delete this question, because question is used in templates!');
        }
        $question->answers()->delete();
        $question->delete();

        return redirect()->route('question.index')->with('success', 'Question deleted successfully');
    }
}
