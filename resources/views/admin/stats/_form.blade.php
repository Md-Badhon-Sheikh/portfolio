{{-- Shared fields for create/edit stat forms --}}
@php $stat = $stat ?? null; @endphp

<div class="grid grid-cols-1 gap-5 sm:grid-cols-2">
    <div>
        <label for="icon" class="mb-1.5 block text-sm font-medium text-heading">Icon</label>
        <select id="icon" name="icon" required
            class="w-full rounded-xl border border-heading/10 bg-page px-4 py-3 text-sm text-heading outline-none transition focus:border-primary focus:ring-2 focus:ring-primary/20 @error('icon') border-red-400 @enderror">
            @foreach (array_keys(\App\Models\Stat::iconMap()) as $iconKey)
                <option value="{{ $iconKey }}" @selected(old('icon', $stat->icon ?? 'award') === $iconKey)>{{ ucwords(str_replace('-', ' ', $iconKey)) }}</option>
            @endforeach
        </select>
        @error('icon') <p class="mt-1.5 text-xs text-red-500">{{ $message }}</p> @enderror
    </div>

    <div>
        <label for="sort_order" class="mb-1.5 block text-sm font-medium text-heading">Order</label>
        <input type="number" id="sort_order" name="sort_order" min="0" value="{{ old('sort_order', $stat->sort_order ?? 0) }}" required
            class="w-full rounded-xl border border-heading/10 bg-page px-4 py-3 text-sm text-heading outline-none transition focus:border-primary focus:ring-2 focus:ring-primary/20 @error('sort_order') border-red-400 @enderror">
        <p class="mt-1.5 text-xs text-body">Lower numbers appear first.</p>
        @error('sort_order') <p class="mt-1.5 text-xs text-red-500">{{ $message }}</p> @enderror
    </div>

    <div>
        <label for="value" class="mb-1.5 block text-sm font-medium text-heading">Value</label>
        <input type="number" id="value" name="value" min="0" value="{{ old('value', $stat->value ?? '') }}" required
            placeholder="55"
            class="w-full rounded-xl border border-heading/10 bg-page px-4 py-3 text-sm text-heading outline-none transition focus:border-primary focus:ring-2 focus:ring-primary/20 @error('value') border-red-400 @enderror">
        @error('value') <p class="mt-1.5 text-xs text-red-500">{{ $message }}</p> @enderror
    </div>

    <div>
        <label for="suffix" class="mb-1.5 block text-sm font-medium text-heading">Suffix</label>
        <input type="text" id="suffix" name="suffix" value="{{ old('suffix', $stat->suffix ?? '') }}"
            placeholder="+  or  /7  or  ' Years'"
            class="w-full rounded-xl border border-heading/10 bg-page px-4 py-3 text-sm text-heading outline-none transition focus:border-primary focus:ring-2 focus:ring-primary/20 @error('suffix') border-red-400 @enderror">
        @error('suffix') <p class="mt-1.5 text-xs text-red-500">{{ $message }}</p> @enderror
    </div>

    <div class="sm:col-span-2">
        <label for="label" class="mb-1.5 block text-sm font-medium text-heading">Label</label>
        <input type="text" id="label" name="label" value="{{ old('label', $stat->label ?? '') }}" required
            placeholder="Projects"
            class="w-full rounded-xl border border-heading/10 bg-page px-4 py-3 text-sm text-heading outline-none transition focus:border-primary focus:ring-2 focus:ring-primary/20 @error('label') border-red-400 @enderror">
        @error('label') <p class="mt-1.5 text-xs text-red-500">{{ $message }}</p> @enderror
    </div>
</div>
