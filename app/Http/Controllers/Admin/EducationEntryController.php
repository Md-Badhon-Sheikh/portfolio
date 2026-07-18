<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\EducationEntry;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class EducationEntryController extends Controller
{
    /**
     * Display a listing of education entries.
     */
    public function index(): View
    {
        $entries = EducationEntry::orderBy('sort_order')->orderBy('id')->get();

        return view('admin.education.index', compact('entries'));
    }

    /**
     * Show the form for creating a new entry.
     */
    public function create(): View
    {
        return view('admin.education.create');
    }

    /**
     * Store a newly created entry.
     */
    public function store(Request $request): RedirectResponse
    {
        $validated = $this->validated($request);

        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('education', 'public');
        }

        EducationEntry::create($validated);

        return redirect()->route('admin.education.index')->with('status', 'Education entry added.');
    }

    /**
     * Show the form for editing an entry.
     */
    public function edit(EducationEntry $education): View
    {
        return view('admin.education.edit', ['entry' => $education]);
    }

    /**
     * Update the specified entry.
     */
    public function update(Request $request, EducationEntry $education): RedirectResponse
    {
        $validated = $this->validated($request);

        if ($request->hasFile('image')) {
            if ($education->image) {
                Storage::disk('public')->delete($education->image);
            }
            $validated['image'] = $request->file('image')->store('education', 'public');
        }

        $education->update($validated);

        return redirect()->route('admin.education.index')->with('status', 'Education entry updated.');
    }

    /**
     * Remove the specified entry.
     */
    public function destroy(EducationEntry $education): RedirectResponse
    {
        if ($education->image) {
            Storage::disk('public')->delete($education->image);
        }

        $education->delete();

        return redirect()->route('admin.education.index')->with('status', 'Education entry removed.');
    }

    /**
     * Shared validation rules for store/update.
     *
     * @return array<string, mixed>
     */
    private function validated(Request $request): array
    {
        return $request->validate([
            'title' => ['required', 'string', 'max:100'],
            'details' => ['required', 'string', 'max:2000'],
            'image' => ['nullable', 'image', 'max:2048'],
            'sort_order' => ['required', 'integer', 'min:0', 'max:999'],
        ]);
    }
}
