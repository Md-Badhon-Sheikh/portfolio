{{-- Shared fields for create/edit gallery-image forms --}}
@php $image = $image ?? null; @endphp

<div class="space-y-5">
    <div>
        <label for="image" class="mb-1.5 block text-sm font-medium text-heading">Image</label>
        @if ($image?->imageUrl())
            <img src="{{ $image->imageUrl() }}" alt="{{ $image->title }}" class="mb-2 h-24 w-24 rounded-lg object-cover">
        @endif
        <input type="file" id="image" name="image" accept="image/*" {{ $image ? '' : 'required' }}
            class="w-full text-sm text-body file:mr-3 file:rounded-lg file:border-0 file:bg-primary/10 file:px-3 file:py-2 file:text-sm file:font-medium file:text-primary hover:file:bg-primary/20">
        @error('image') <p class="mt-1.5 text-xs text-red-500">{{ $message }}</p> @enderror
    </div>

    <div>
        <label for="title" class="mb-1.5 block text-sm font-medium text-heading">Title</label>
        <input type="text" id="title" name="title" value="{{ old('title', $image->title ?? '') }}" required
            placeholder="Modern business website"
            class="w-full rounded-xl border border-heading/10 bg-page px-4 py-3 text-sm text-heading outline-none transition focus:border-primary focus:ring-2 focus:ring-primary/20 @error('title') border-red-400 @enderror">
        <p class="mt-1.5 text-xs text-body">Shown as the caption when hovered, and in the lightbox.</p>
        @error('title') <p class="mt-1.5 text-xs text-red-500">{{ $message }}</p> @enderror
    </div>

    <div class="grid grid-cols-1 gap-5 sm:grid-cols-2">
        <div>
            <label for="size" class="mb-1.5 block text-sm font-medium text-heading">Size</label>
            <select id="size" name="size" required
                class="w-full rounded-xl border border-heading/10 bg-page px-4 py-3 text-sm text-heading outline-none transition focus:border-primary focus:ring-2 focus:ring-primary/20 @error('size') border-red-400 @enderror">
                @foreach (array_keys(\App\Models\GalleryImage::sizeMap()) as $sizeKey)
                    <option value="{{ $sizeKey }}" @selected(old('size', $image->size ?? 'medium') === $sizeKey)>{{ ucfirst($sizeKey) }}</option>
                @endforeach
            </select>
            <p class="mt-1.5 text-xs text-body">Controls the card's width in the masonry grid.</p>
            @error('size') <p class="mt-1.5 text-xs text-red-500">{{ $message }}</p> @enderror
        </div>

        <div>
            <label for="sort_order" class="mb-1.5 block text-sm font-medium text-heading">Order</label>
            <input type="number" id="sort_order" name="sort_order" min="0" value="{{ old('sort_order', $image->sort_order ?? 0) }}" required
                class="w-full rounded-xl border border-heading/10 bg-page px-4 py-3 text-sm text-heading outline-none transition focus:border-primary focus:ring-2 focus:ring-primary/20 @error('sort_order') border-red-400 @enderror">
            <p class="mt-1.5 text-xs text-body">Lower numbers appear first.</p>
            @error('sort_order') <p class="mt-1.5 text-xs text-red-500">{{ $message }}</p> @enderror
        </div>
    </div>
</div>
