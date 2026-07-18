<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Experience;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ExperienceController extends Controller
{
    /**
     * Display a listing of work experience entries.
     */
    public function index(): View
    {
        $experiences = Experience::orderBy('sort_order')->orderBy('id')->get();

        return view('admin.experiences.index', compact('experiences'));
    }

    /**
     * Show the form for creating a new entry.
     */
    public function create(): View
    {
        return view('admin.experiences.create');
    }

    /**
     * Store a newly created entry.
     */
    public function store(Request $request): RedirectResponse
    {
        Experience::create($this->validated($request));

        return redirect()->route('admin.experiences.index')->with('status', 'Experience added.');
    }

    /**
     * Show the form for editing an entry.
     */
    public function edit(Experience $experience): View
    {
        return view('admin.experiences.edit', compact('experience'));
    }

    /**
     * Update the specified entry.
     */
    public function update(Request $request, Experience $experience): RedirectResponse
    {
        $experience->update($this->validated($request));

        return redirect()->route('admin.experiences.index')->with('status', 'Experience updated.');
    }

    /**
     * Remove the specified entry.
     */
    public function destroy(Experience $experience): RedirectResponse
    {
        $experience->delete();

        return redirect()->route('admin.experiences.index')->with('status', 'Experience removed.');
    }

    /**
     * Shared validation rules for store/update.
     *
     * @return array<string, mixed>
     */
    private function validated(Request $request): array
    {
        return $request->validate([
            'period' => ['required', 'string', 'max:50'],
            'role' => ['required', 'string', 'max:100'],
            'company' => ['required', 'string', 'max:100'],
            'description' => ['required', 'string', 'max:1000'],
            'sort_order' => ['required', 'integer', 'min:0', 'max:999'],
        ]);
    }
}
