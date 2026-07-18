{{-- Shared fields for create/edit contact-info forms --}}
@php $item = $item ?? null; @endphp

<div class="grid grid-cols-1 gap-5 sm:grid-cols-2">
    <div>
        <label for="icon" class="mb-1.5 block text-sm font-medium text-heading">Icon</label>
        <select id="icon" name="icon" required
            class="w-full rounded-xl border border-heading/10 bg-page px-4 py-3 text-sm text-heading outline-none transition focus:border-primary focus:ring-2 focus:ring-primary/20 @error('icon') border-red-400 @enderror">
            @foreach (array_keys(\App\Models\ContactInfo::iconMap()) as $iconKey)
                <option value="{{ $iconKey }}" @selected(old('icon', $item->icon ?? 'phone') === $iconKey)>{{ ucwords($iconKey) }}</option>
            @endforeach
        </select>
        @error('icon') <p class="mt-1.5 text-xs text-red-500">{{ $message }}</p> @enderror
    </div>

    <div>
        <label for="sort_order" class="mb-1.5 block text-sm font-medium text-heading">Order</label>
        <input type="number" id="sort_order" name="sort_order" min="0" value="{{ old('sort_order', $item->sort_order ?? 0) }}" required
            class="w-full rounded-xl border border-heading/10 bg-page px-4 py-3 text-sm text-heading outline-none transition focus:border-primary focus:ring-2 focus:ring-primary/20 @error('sort_order') border-red-400 @enderror">
        <p class="mt-1.5 text-xs text-body">Lower numbers appear first.</p>
        @error('sort_order') <p class="mt-1.5 text-xs text-red-500">{{ $message }}</p> @enderror
    </div>

    <div class="sm:col-span-2">
        <label for="title" class="mb-1.5 block text-sm font-medium text-heading">Title</label>
        <input type="text" id="title" name="title" value="{{ old('title', $item->title ?? '') }}" required
            placeholder="Phone"
            class="w-full rounded-xl border border-heading/10 bg-page px-4 py-3 text-sm text-heading outline-none transition focus:border-primary focus:ring-2 focus:ring-primary/20 @error('title') border-red-400 @enderror">
        @error('title') <p class="mt-1.5 text-xs text-red-500">{{ $message }}</p> @enderror
    </div>

    <div class="sm:col-span-2">
        <label for="details" class="mb-1.5 block text-sm font-medium text-heading">Details</label>
        <input type="text" id="details" name="details" value="{{ old('details', $item->details ?? '') }}" required
            placeholder="+8801642874989"
            class="w-full rounded-xl border border-heading/10 bg-page px-4 py-3 text-sm text-heading outline-none transition focus:border-primary focus:ring-2 focus:ring-primary/20 @error('details') border-red-400 @enderror">
        <p class="mt-1.5 text-xs text-body">For the Phone / Email icons this becomes a clickable tel:/mailto: link automatically.</p>
        @error('details') <p class="mt-1.5 text-xs text-red-500">{{ $message }}</p> @enderror
    </div>
</div>
