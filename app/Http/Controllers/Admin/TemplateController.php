<?php

namespace App\Http\Controllers\Admin;

use Exception;
use App\Models\Question;
use App\Models\Template;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use App\Models\Questionaire;
use Illuminate\Support\Facades\DB;

class TemplateController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $index['templates'] = Template::with('questions')->latest()->paginate(10);
        return view('admin.templates.index', $index);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $index['questionaires'] = Questionaire::latest()->get();
        return view('admin.templates.create', $index);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if ($request->message == "<p>&nbsp;</p>") {
            $request->request->remove('message');
        }
        // dd($request->all());
        $request->validate([
            'title' => 'required|min:3',
            'template_type' => 'required',
            'message' => 'required',
            'questions' => 'required',
        ]);

        DB::beginTransaction();
        try {

            $template = Template::create([
                'user_id' => auth()->user()->id,
                'title' => $request->title,
                'template_type' => $request->template_type,
                'message' => $request->message,
            ]);

            if ($request->questions) {
                $template->questions()->attach(explode(',', $request->questions));
            }

            DB::commit();

            return redirect()->route('template.index')->with('success', 'Template created successfully.');
        } catch (Exception $e) {
            DB::rollBack();
            Log::error('Error creating template: ' . $e->getMessage(), [$e]);
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
        $index['template'] = Template::with('questions')->findOrFail($id);
        $index['questionaires'] = Questionaire::latest()->get();
        return view('admin.templates.edit', $index);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        if ($request->message == "<p>&nbsp;</p>") {
            $request->request->remove('message');
        }
        // dd($request->all());
        $request->validate([
            'title' => 'required|min:3',
            'template_type' => 'required',
            'message' => 'required',
            'questions' => 'required',
        ]);

        DB::beginTransaction();
        try {

            $template = Template::findOrFail($id);

            $template->update([
                'user_id' => auth()->user()->id,
                'title' => $request->title,
                'template_type' => $request->template_type,
                'message' => $request->message,
            ]);

            if ($request->questions) {
                $template->questions()->sync(explode(',', $request->questions));
            } else {
                $template->questions()->sync([]);
            }

            DB::commit();

            return redirect()->route('template.index')->with('success', 'Template updated successfully.');
        } catch (Exception $e) {
            DB::rollBack();
            Log::error('Error updating template: ' . $e->getMessage(), [$e]);
            return redirect()->back()->withErrors(['title' => $e->getMessage()])->withInput();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
