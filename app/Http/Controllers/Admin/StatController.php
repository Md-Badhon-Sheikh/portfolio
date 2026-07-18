<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Stat;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\View\View;

class StatController extends Controller
{
    /**
     * Display a listing of the hero stats.
     */
    public function index(): View
    {
        $stats = Stat::orderBy('sort_order')->orderBy('id')->get();

        return view('admin.stats.index', compact('stats'));
    }

    /**
     * Show the form for creating a new stat.
     */
    public function create(): View
    {
        return view('admin.stats.create');
    }

    /**
     * Store a newly created stat.
     */
    public function store(Request $request): RedirectResponse
    {
        $validated = $this->validated($request);

        Stat::create($validated);

        return redirect()->route('admin.stats.index')->with('status', 'Stat added.');
    }

    /**
     * Show the form for editing a stat.
     */
    public function edit(Stat $stat): View
    {
        return view('admin.stats.edit', compact('stat'));
    }

    /**
     * Update the specified stat.
     */
    public function update(Request $request, Stat $stat): RedirectResponse
    {
        $validated = $this->validated($request);

        $stat->update($validated);

        return redirect()->route('admin.stats.index')->with('status', 'Stat updated.');
    }

    /**
     * Remove the specified stat.
     */
    public function destroy(Stat $stat): RedirectResponse
    {
        $stat->delete();

        return redirect()->route('admin.stats.index')->with('status', 'Stat removed.');
    }

    /**
     * Shared validation rules for store/update.
     *
     * @return array<string, mixed>
     */
    private function validated(Request $request): array
    {
        return $request->validate([
            'icon' => ['required', 'string', Rule::in(array_keys(Stat::iconMap()))],
            'value' => ['required', 'integer', 'min:0', 'max:999999'],
            'suffix' => ['nullable', 'string', 'max:20'],
            'label' => ['required', 'string', 'max:50'],
            'sort_order' => ['required', 'integer', 'min:0', 'max:999'],
        ]);
    }
}
