{{-- Shared fields for create/edit experience forms --}}
@php $experience = $experience ?? null; @endphp

<div class="space-y-5">
    <div class="grid grid-cols-1 gap-5 sm:grid-cols-2">
        <div>
            <label for="period" class="mb-1.5 block text-sm font-medium text-heading">Period</label>
            <input type="text" id="period" name="period" value="{{ old('period', $experience->period ?? '') }}" required
                placeholder="2024 — Present"
                class="w-full rounded-xl border border-heading/10 bg-page px-4 py-3 text-sm text-heading outline-none transition focus:border-primary focus:ring-2 focus:ring-primary/20 @error('period') border-red-400 @enderror">
            @error('period') <p class="mt-1.5 text-xs text-red-500">{{ $message }}</p> @enderror
        </div>

        <div>
            <label for="sort_order" class="mb-1.5 block text-sm font-medium text-heading">Order</label>
            <input type="number" id="sort_order" name="sort_order" min="0" value="{{ old('sort_order', $experience->sort_order ?? 0) }}" required
                class="w-full rounded-xl border border-heading/10 bg-page px-4 py-3 text-sm text-heading outline-none transition focus:border-primary focus:ring-2 focus:ring-primary/20 @error('sort_order') border-red-400 @enderror">
            <p class="mt-1.5 text-xs text-body">Lower numbers appear first.</p>
            @error('sort_order') <p class="mt-1.5 text-xs text-red-500">{{ $message }}</p> @enderror
        </div>
    </div>

    <div>
        <label for="role" class="mb-1.5 block text-sm font-medium text-heading">Role</label>
        <input type="text" id="role" name="role" value="{{ old('role', $experience->role ?? '') }}" required
            placeholder="Freelance Web Developer"
            class="w-full rounded-xl border border-heading/10 bg-page px-4 py-3 text-sm text-heading outline-none transition focus:border-primary focus:ring-2 focus:ring-primary/20 @error('role') border-red-400 @enderror">
        @error('role') <p class="mt-1.5 text-xs text-red-500">{{ $message }}</p> @enderror
    </div>

    <div>
        <label for="company" class="mb-1.5 block text-sm font-medium text-heading">Company</label>
        <input type="text" id="company" name="company" value="{{ old('company', $experience->company ?? '') }}" required
            placeholder="Self-employed"
            class="w-full rounded-xl border border-heading/10 bg-page px-4 py-3 text-sm text-heading outline-none transition focus:border-primary focus:ring-2 focus:ring-primary/20 @error('company') border-red-400 @enderror">
        @error('company') <p class="mt-1.5 text-xs text-red-500">{{ $message }}</p> @enderror
    </div>

    <div>
        <label for="description" class="mb-1.5 block text-sm font-medium text-heading">Description</label>
        <textarea id="description" name="description" rows="4" required
            placeholder="What you did in this role"
            class="w-full rounded-xl border border-heading/10 bg-page px-4 py-3 text-sm text-heading outline-none transition focus:border-primary focus:ring-2 focus:ring-primary/20 @error('description') border-red-400 @enderror">{{ old('description', $experience->description ?? '') }}</textarea>
        @error('description') <p class="mt-1.5 text-xs text-red-500">{{ $message }}</p> @enderror
    </div>
</div>
