<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\ProfileUpdateRequest;

class MyProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function index(Request $request): View
    {
        $user = auth()->user();
        return view('my_profile', [
            'user' => $user,
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $request->user()->fill($request->validated());

        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }

        $request->user()->save();

        return Redirect::route('my-profile')->with('success', 'profile-updated');
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }

    public function change_password(Request $request): RedirectResponse
    {
        $request->validate([
            'password' => 'required',
            'new_password' => 'required|confirmed',
        ]);

        $user = User::findOrFail(auth()->id());

        if (Hash::check($request->password, $user->password)) {
            $request->user()->email_verified_at = null;
            $user->password = Hash::make($request->new_password);
            $user->save();

            return Redirect::route('my-profile')->with('success', 'Password changed successfully');
        } else {

            return redirect(route('my-profile').'#devs')->with(['error' => 'Current password is incorrect', 'password_error' => 1])->withInput(['tab' => 'devs']);

        }
    }
}
