<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AboutImage;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class AboutImageController extends Controller
{
    /**
     * Display a listing of the About → Education/Bio slider images.
     */
    public function index(): View
    {
        $images = AboutImage::orderBy('sort_order')->orderBy('id')->get();

        return view('admin.about-images.index', compact('images'));
    }

    /**
     * Show the form for creating a new slide.
     */
    public function create(): View
    {
        return view('admin.about-images.create');
    }

    /**
     * Store a newly created slide.
     */
    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'image' => ['required', 'image', 'max:4096'],
            'type' => ['required', 'in:education,bio'],
            'alt' => ['nullable', 'string', 'max:150'],
            'sort_order' => ['required', 'integer', 'min:0', 'max:999'],
        ]);

        $validated['image'] = $request->file('image')->store('about-images', 'public');

        AboutImage::create($validated);

        return redirect()->route('admin.about-images.index')->with('status', 'Image added.');
    }

    /**
     * Show the form for editing a slide.
     */
    public function edit(AboutImage $about_image): View
    {
        return view('admin.about-images.edit', ['image' => $about_image]);
    }

    /**
     * Update the specified slide.
     */
    public function update(Request $request, AboutImage $about_image): RedirectResponse
    {
        $validated = $request->validate([
            'image' => ['nullable', 'image', 'max:4096'],
            'type' => ['required', 'in:education,bio'],
            'alt' => ['nullable', 'string', 'max:150'],
            'sort_order' => ['required', 'integer', 'min:0', 'max:999'],
        ]);

        if ($request->hasFile('image')) {
            Storage::disk('public')->delete($about_image->image);
            $validated['image'] = $request->file('image')->store('about-images', 'public');
        }

        $about_image->update($validated);

        return redirect()->route('admin.about-images.index')->with('status', 'Image updated.');
    }

    /**
     * Remove the specified slide.
     */
    public function destroy(AboutImage $about_image): RedirectResponse
    {
        Storage::disk('public')->delete($about_image->image);
        $about_image->delete();

        return redirect()->route('admin.about-images.index')->with('status', 'Image removed.');
    }
}
