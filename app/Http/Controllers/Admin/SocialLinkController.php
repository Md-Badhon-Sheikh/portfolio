<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SocialLink;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\View\View;

class SocialLinkController extends Controller
{
    /**
     * Display a listing of social links.
     */
    public function index(): View
    {
        $links = SocialLink::orderBy('sort_order')->orderBy('id')->get();

        return view('admin.social-links.index', compact('links'));
    }

    /**
     * Show the form for creating a new link.
     */
    public function create(): View
    {
        return view('admin.social-links.create');
    }

    /**
     * Store a newly created link.
     */
    public function store(Request $request): RedirectResponse
    {
        SocialLink::create($this->validated($request));

        return redirect()->route('admin.social-links.index')->with('status', 'Social link added.');
    }

    /**
     * Show the form for editing a link.
     */
    public function edit(SocialLink $social_link): View
    {
        return view('admin.social-links.edit', ['link' => $social_link]);
    }

    /**
     * Update the specified link.
     */
    public function update(Request $request, SocialLink $social_link): RedirectResponse
    {
        $social_link->update($this->validated($request));

        return redirect()->route('admin.social-links.index')->with('status', 'Social link updated.');
    }

    /**
     * Remove the specified link.
     */
    public function destroy(SocialLink $social_link): RedirectResponse
    {
        $social_link->delete();

        return redirect()->route('admin.social-links.index')->with('status', 'Social link removed.');
    }

    /**
     * Shared validation rules for store/update.
     *
     * @return array<string, mixed>
     */
    private function validated(Request $request): array
    {
        return $request->validate([
            'platform' => ['required', 'string', Rule::in(array_keys(SocialLink::platformMap()))],
            'url' => ['required', 'string', 'max:255'],
            'sort_order' => ['required', 'integer', 'min:0', 'max:999'],
        ]);
    }
}
