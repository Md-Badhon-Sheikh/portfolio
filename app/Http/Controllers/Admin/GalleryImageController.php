<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\GalleryImage;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;
use Illuminate\View\View;

class GalleryImageController extends Controller
{
    /**
     * Display a listing of gallery images.
     */
    public function index(): View
    {
        $images = GalleryImage::orderBy('sort_order')->orderBy('id')->get();

        return view('admin.gallery-images.index', compact('images'));
    }

    /**
     * Show the form for creating a new image.
     */
    public function create(): View
    {
        return view('admin.gallery-images.create');
    }

    /**
     * Store a newly created image.
     */
    public function store(Request $request): RedirectResponse
    {
        $validated = $this->validated($request);
        $validated['image'] = $request->file('image')->store('gallery', 'public');

        GalleryImage::create($validated);

        return redirect()->route('admin.gallery-images.index')->with('status', 'Image added.');
    }

    /**
     * Show the form for editing an image.
     */
    public function edit(GalleryImage $gallery_image): View
    {
        return view('admin.gallery-images.edit', ['image' => $gallery_image]);
    }

    /**
     * Update the specified image.
     */
    public function update(Request $request, GalleryImage $gallery_image): RedirectResponse
    {
        $validated = $this->validated($request, required: false);

        if ($request->hasFile('image')) {
            Storage::disk('public')->delete($gallery_image->image);
            $validated['image'] = $request->file('image')->store('gallery', 'public');
        }

        $gallery_image->update($validated);

        return redirect()->route('admin.gallery-images.index')->with('status', 'Image updated.');
    }

    /**
     * Remove the specified image.
     */
    public function destroy(GalleryImage $gallery_image): RedirectResponse
    {
        Storage::disk('public')->delete($gallery_image->image);
        $gallery_image->delete();

        return redirect()->route('admin.gallery-images.index')->with('status', 'Image removed.');
    }

    /**
     * Shared validation rules for store/update.
     *
     * @return array<string, mixed>
     */
    private function validated(Request $request, bool $required = true): array
    {
        return $request->validate([
            'title' => ['required', 'string', 'max:100'],
            'image' => [$required ? 'required' : 'nullable', 'image', 'max:4096'],
            'size' => ['required', 'string', Rule::in(array_keys(GalleryImage::sizeMap()))],
            'sort_order' => ['required', 'integer', 'min:0', 'max:999'],
        ]);
    }
}
