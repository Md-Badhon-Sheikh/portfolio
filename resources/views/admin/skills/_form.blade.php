{{-- Shared fields for create/edit skill forms --}}
@php $skill = $skill ?? null; @endphp

<div class="grid grid-cols-1 gap-5 sm:grid-cols-2">
    <div>
        <label for="name" class="mb-1.5 block text-sm font-medium text-heading">Name</label>
        <input type="text" id="name" name="name" value="{{ old('name', $skill->name ?? '') }}" required
            placeholder="Laravel"
            class="w-full rounded-xl border border-heading/10 bg-page px-4 py-3 text-sm text-heading outline-none transition focus:border-primary focus:ring-2 focus:ring-primary/20 @error('name') border-red-400 @enderror">
        @error('name') <p class="mt-1.5 text-xs text-red-500">{{ $message }}</p> @enderror
    </div>

    <div>
        <label for="sort_order" class="mb-1.5 block text-sm font-medium text-heading">Order</label>
        <input type="number" id="sort_order" name="sort_order" min="0" value="{{ old('sort_order', $skill->sort_order ?? 0) }}" required
            class="w-full rounded-xl border border-heading/10 bg-page px-4 py-3 text-sm text-heading outline-none transition focus:border-primary focus:ring-2 focus:ring-primary/20 @error('sort_order') border-red-400 @enderror">
        <p class="mt-1.5 text-xs text-body">Lower numbers appear first.</p>
        @error('sort_order') <p class="mt-1.5 text-xs text-red-500">{{ $message }}</p> @enderror
    </div>

    <div class="sm:col-span-2">
        <label for="level" class="mb-1.5 block text-sm font-medium text-heading">Level (%)</label>
        <input type="number" id="level" name="level" min="0" max="100" value="{{ old('level', $skill->level ?? 80) }}" required
            class="w-full max-w-xs rounded-xl border border-heading/10 bg-page px-4 py-3 text-sm text-heading outline-none transition focus:border-primary focus:ring-2 focus:ring-primary/20 @error('level') border-red-400 @enderror">
        <p class="mt-1.5 text-xs text-body">0–100 — fills the progress bar on the homepage.</p>
        @error('level') <p class="mt-1.5 text-xs text-red-500">{{ $message }}</p> @enderror
    </div>
</div>
