{{-- Shared fields for create/edit education entry forms --}}
@php $entry = $entry ?? null; @endphp

<div class="space-y-5">
    <div>
        <label for="title" class="mb-1.5 block text-sm font-medium text-heading">Title</label>
        <input type="text" id="title" name="title" value="{{ old('title', $entry->title ?? '') }}" required
            placeholder="Secondary Education"
            class="w-full rounded-xl border border-heading/10 bg-page px-4 py-3 text-sm text-heading outline-none transition focus:border-primary focus:ring-2 focus:ring-primary/20 @error('title') border-red-400 @enderror">
        @error('title') <p class="mt-1.5 text-xs text-red-500">{{ $message }}</p> @enderror
    </div>

    <div>
        <label for="details" class="mb-1.5 block text-sm font-medium text-heading">Details</label>
        <textarea id="details" name="details" rows="6" required
            placeholder="Institution: Your School Name&#10;Certificate: SSC&#10;GPA: 5.0&#10;Graduated: 2018"
            class="w-full rounded-xl border border-heading/10 bg-page px-4 py-3 font-mono text-sm text-heading outline-none transition focus:border-primary focus:ring-2 focus:ring-primary/20 @error('details') border-red-400 @enderror">{{ old('details', $entry->details ?? '') }}</textarea>
        <p class="mt-1.5 text-xs text-body">One "Label: value" pair per line — each line renders as a bullet with the label bolded.</p>
        @error('details') <p class="mt-1.5 text-xs text-red-500">{{ $message }}</p> @enderror
    </div>

    <div>
        <label for="image" class="mb-1.5 block text-sm font-medium text-heading">Image</label>
        @if (($entry->imageUrl() ?? null))
            <img src="{{ $entry->imageUrl() }}" alt="{{ $entry->title }}" class="mb-2 h-20 w-20 rounded-lg object-cover">
        @endif
        <input type="file" id="image" name="image" accept="image/*"
            class="w-full text-sm text-body file:mr-3 file:rounded-lg file:border-0 file:bg-primary/10 file:px-3 file:py-2 file:text-sm file:font-medium file:text-primary hover:file:bg-primary/20">
        @error('image') <p class="mt-1.5 text-xs text-red-500">{{ $message }}</p> @enderror
    </div>

    <div>
        <label for="sort_order" class="mb-1.5 block text-sm font-medium text-heading">Order</label>
        <input type="number" id="sort_order" name="sort_order" min="0" value="{{ old('sort_order', $entry->sort_order ?? 0) }}" required
            class="w-full max-w-xs rounded-xl border border-heading/10 bg-page px-4 py-3 text-sm text-heading outline-none transition focus:border-primary focus:ring-2 focus:ring-primary/20 @error('sort_order') border-red-400 @enderror">
        <p class="mt-1.5 text-xs text-body">Lower numbers appear first.</p>
        @error('sort_order') <p class="mt-1.5 text-xs text-red-500">{{ $message }}</p> @enderror
    </div>
</div>
