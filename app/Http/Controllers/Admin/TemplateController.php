<?php

namespace App\Http\Controllers\Admin;

use App\Models\Question;
use App\Models\Template;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

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
        $index['questions'] = Question::latest()->get();
        return view('admin.templates.create', $index);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
