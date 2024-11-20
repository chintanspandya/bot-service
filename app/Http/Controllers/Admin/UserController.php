<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $index['users'] = User::latest()->paginate(10);
        return view('admin.users.index', $index);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.users.create');

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = $request->validate([
            'name' => 'required|max:256',
            'email' => 'required|unique:users,email,null,id,deleted_at,null',
            'role' => 'required|in:admin,manager,user',
            'contact_no' => 'required|numeric',
            'password' => 'required|confirmed|min:6',
        ]);
        DB::beginTransaction();
        try {

            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'role' => $request->role,
                'contact_no' => $request->contact_no,
                'password' => bcrypt($request->password),
            ]);

            DB::commit();

            return redirect()->route('user.index')->with('success', 'User created successfully');
        } catch (Exception $e) {
            DB::rollBack();
            Log::error('Error while creating user ' . $e->getMessage(), [$e]);
            return redirect()->back()->withErrors(['title' => 'Error creating user: ' . $e->getMessage()])->withInput();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('admin.users.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {

        $validator = $request->validate([
            'name' => 'required|max:256',
            'email' => 'required|unique:users,email,' . $id . ',id,deleted_at,null',
            'role' => 'required|in:admin,manager,user',
            'contact_no' => 'required|numeric',
        ]);

        DB::beginTransaction();
        try {
            $user = User::findOrFail($id);

            $user->update([
                'name' => $request->name,
                'email' => $request->email,
                'role' => $request->role,
                'contact_no' => $request->contact_no,
            ]);
            DB::commit();

            return redirect()->route('user.index')->with('success', 'User updated successfully');

        } catch (Exception $e) {
            DB::rollBack();
            Log::error('Error while updating user ' . $e->getMessage(), [$e]);
            return redirect()->back()->withErrors(['title' => 'Error updating user: ' . $e->getMessage()])->withInput();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        if (auth()->user()->role != 'admin') {
            abort(403);
        }
        $user = User::findOrFail($id);

        if ($user->id == auth()->id()) {
            return redirect()->route('user.index')->with('error', 'You cannot delete yourself');
        }
        $user->delete();

        return redirect()->route('user.index')->with('success', 'User deleted successfully');
    }
}
