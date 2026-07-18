<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ContactInfo;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\View\View;

class ContactInfoController extends Controller
{
    /**
     * Display a listing of contact info cards.
     */
    public function index(): View
    {
        $items = ContactInfo::orderBy('sort_order')->orderBy('id')->get();

        return view('admin.contact-infos.index', compact('items'));
    }

    /**
     * Show the form for creating a new card.
     */
    public function create(): View
    {
        return view('admin.contact-infos.create');
    }

    /**
     * Store a newly created card.
     */
    public function store(Request $request): RedirectResponse
    {
        ContactInfo::create($this->validated($request));

        return redirect()->route('admin.contact-infos.index')->with('status', 'Contact info added.');
    }

    /**
     * Show the form for editing a card.
     */
    public function edit(ContactInfo $contact_info): View
    {
        return view('admin.contact-infos.edit', ['item' => $contact_info]);
    }

    /**
     * Update the specified card.
     */
    public function update(Request $request, ContactInfo $contact_info): RedirectResponse
    {
        $contact_info->update($this->validated($request));

        return redirect()->route('admin.contact-infos.index')->with('status', 'Contact info updated.');
    }

    /**
     * Remove the specified card.
     */
    public function destroy(ContactInfo $contact_info): RedirectResponse
    {
        $contact_info->delete();

        return redirect()->route('admin.contact-infos.index')->with('status', 'Contact info removed.');
    }

    /**
     * Shared validation rules for store/update.
     *
     * @return array<string, mixed>
     */
    private function validated(Request $request): array
    {
        return $request->validate([
            'icon' => ['required', 'string', Rule::in(array_keys(ContactInfo::iconMap()))],
            'title' => ['required', 'string', 'max:50'],
            'details' => ['required', 'string', 'max:255'],
            'sort_order' => ['required', 'integer', 'min:0', 'max:999'],
        ]);
    }
}
