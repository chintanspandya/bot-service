<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Question;
use App\Models\Questionaire;
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
        $index['questions'] = Questionaire::with('questions.answers')->latest()->paginate(10);
        return view('admin.questions.index', $index);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.questions.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'questions' => 'required|min:1',
            'questions.*.input' => 'required|min:3', // min 3 characters
            'questions.*.answers' => 'required|min:1',
            'questions.*.answers.*.input' => 'required',
        ]);

        DB::beginTransaction();
        try {

            $questionaire = Questionaire::create([
                'title' => $request->questionaire,
            ]);

            foreach ($request->questions as $key => $req_question) {
                $question = Question::create([
                    'questionaire_id' => $questionaire->id,
                    'question' => $req_question['input'],
                ]);

                if (isset($req_question['answers'])) {
                    foreach ($req_question['answers'] as $req_answer) {
                        $question->answers()->create([
                            'answer' => $req_answer['input'],
                        ]);
                    }
                }
            }

            DB::commit();

            return redirect()->route('question.index')->with('success', 'Questionaire created successfully.');
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
        $index['questionaire'] = Questionaire::with('questions.answers')->findOrFail($id);
        return view('admin.questions.edit', $index);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // dd($request->all());
        $request->validate([
            'questions' => 'required|min:1',
            'questions.*.input' => 'required|min:3', // min 3 characters
            'questions.*.answers' => 'required|min:1',
            'questions.*.answers.*.input' => 'required',
        ]);

        DB::beginTransaction();
        try {

            $questionaire = Questionaire::findOrFail($id);

            if ($request->questions) {
                if (count(array_column($request->questions, 'id') ?? []) > 0) {
                    // QuestionAnswer::where('questionaire_id', $questionaire->id)
                    // ->delete();
                    $q = Question::where('questionaire_id', $questionaire->id)
                        ->whereNotIn('id', array_column($request->questions, 'id'))
                        ->get();
                    foreach ($q as $_q) {
                        $_q->answers()->delete();
                        $_q->delete();
                    }
                }
                foreach ($request->questions as $key => $req_question) {
                    if (isset($req_question['id'])) {
                        $question = Question::findOrFail($req_question['id']);
                        $question->update([
                            'question' => $req_question['input'],
                        ]);
                    } else {
                        $question = Question::create([
                            'question' => $req_question['input'],
                            'questionaire_id' => $questionaire->id,
                        ]);
                    }

                    if (isset($req_question['answers'])) {
                        $question->answers()
                            ->whereNotIn('id', array_column($req_question['answers'], 'id'))
                            ->delete();

                        foreach ($req_question['answers'] as $req_answer) {
                            if (isset($req_answer['id'])) {
                                $question->answers()
                                    ->where('id', $req_answer['id'])
                                    ->update([
                                        'answer' => $req_answer['input'],
                                    ]);
                            } else {
                                $question->answers()
                                    ->create([
                                        'answer' => $req_answer['input'],
                                    ]);
                            }
                        }
                    } else {
                        $question->answers()->delete();
                    }
                }
            }

            DB::commit();

            return redirect()->route('question.index')->with('success', 'Questionaire created successfully.');
        } catch (Exception $e) {
            DB::rollBack();
            Log::error('Error creating questionaire: ' . $e->getMessage(), [$e]);
            return redirect()->back()->withErrors(['title' => $e->getMessage()])->withInput();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $questionaire = Questionaire::with(['templates', 'questions.answers'])->findOrFail($id);

        if ($questionaire->templates->count()) {
            return redirect()->route('question.index')->with('error', 'Unable to delete this questionaire, because questionaire is used in templates!');
        }
        foreach ($questionaire->questions as $key => $question) {
            # code...
            $question->answers()->delete();
        }
        $questionaire->questions()->delete();
        $questionaire->delete();

        return redirect()->route('question.index')->with('success', 'Questionaire deleted successfully');
    }
}
