<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\Password;
use Illuminate\View\View;

class ProfileController extends Controller
{
    /**
     * Show the profile edit form.
     */
    public function edit(Request $request): View
    {
        return view('admin.profile', ['user' => $request->user()]);
    }

    /**
     * Update the user's profile: account info, and the content shown in the
     * public hero section (designation, bio, avatar, CV, contact link).
     */
    public function update(Request $request): RedirectResponse
    {
        $user = $request->user();

        $validated = $request->validate([
            'name' => ['required', 'string', 'max:100'],
            'email' => ['required', 'string', 'email', 'max:150', Rule::unique('users', 'email')->ignore($user->id)],
            'designation' => ['nullable', 'string', 'max:150'],
            'bio' => ['nullable', 'string', 'max:1000'],
            'contact_link' => ['nullable', 'string', 'max:255'],
            'avatar' => ['nullable', 'image', 'max:2048'],
            'cv' => ['nullable', 'file', 'mimes:pdf', 'max:5120'],
        ]);

        if ($request->hasFile('avatar')) {
            if ($user->avatar) {
                Storage::disk('public')->delete($user->avatar);
            }
            $validated['avatar'] = $request->file('avatar')->store('avatars', 'public');
        }

        if ($request->hasFile('cv')) {
            if ($user->cv) {
                Storage::disk('public')->delete($user->cv);
            }
            $validated['cv'] = $request->file('cv')->store('cv', 'public');
        }

        $user->update($validated);

        return back()->with('status', 'Your profile has been updated.');
    }

    /**
     * Update the user's password.
     */
    public function updatePassword(Request $request): RedirectResponse
    {
        $request->validate([
            'current_password' => ['required', 'current_password'],
            'password' => ['required', 'confirmed', Password::defaults()],
        ]);

        $request->user()->update([
            'password' => Hash::make($request->input('password')),
        ]);

        return back()->with('status', 'Your password has been changed.');
    }
}
