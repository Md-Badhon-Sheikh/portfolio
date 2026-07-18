{{-- Shared fields for create/edit service forms --}}
@php $service = $service ?? null; @endphp

<div class="grid grid-cols-1 gap-5 sm:grid-cols-2">
    <div>
        <label for="icon" class="mb-1.5 block text-sm font-medium text-heading">Icon</label>
        <select id="icon" name="icon" required
            class="w-full rounded-xl border border-heading/10 bg-page px-4 py-3 text-sm text-heading outline-none transition focus:border-primary focus:ring-2 focus:ring-primary/20 @error('icon') border-red-400 @enderror">
            @foreach (array_keys(\App\Models\Service::iconMap()) as $iconKey)
                <option value="{{ $iconKey }}" @selected(old('icon', $service->icon ?? 'design') === $iconKey)>{{ ucwords(str_replace('-', ' ', $iconKey)) }}</option>
            @endforeach
        </select>
        @error('icon') <p class="mt-1.5 text-xs text-red-500">{{ $message }}</p> @enderror
    </div>

    <div>
        <label for="color" class="mb-1.5 block text-sm font-medium text-heading">Accent Color</label>
        <select id="color" name="color" required
            class="w-full rounded-xl border border-heading/10 bg-page px-4 py-3 text-sm text-heading outline-none transition focus:border-primary focus:ring-2 focus:ring-primary/20 @error('color') border-red-400 @enderror">
            @foreach (\App\Models\Service::colorOptions() as $colorClass)
                <option value="{{ $colorClass }}" @selected(old('color', $service->color ?? 'text-orange-600') === $colorClass)>
                    {{ ucfirst(str_replace(['text-', '-600', '-500'], '', $colorClass)) }}
                </option>
            @endforeach
        </select>
        @error('color') <p class="mt-1.5 text-xs text-red-500">{{ $message }}</p> @enderror
    </div>

    <div class="sm:col-span-2">
        <label for="title" class="mb-1.5 block text-sm font-medium text-heading">Title</label>
        <input type="text" id="title" name="title" value="{{ old('title', $service->title ?? '') }}" required
            placeholder="Web Development"
            class="w-full rounded-xl border border-heading/10 bg-page px-4 py-3 text-sm text-heading outline-none transition focus:border-primary focus:ring-2 focus:ring-primary/20 @error('title') border-red-400 @enderror">
        @error('title') <p class="mt-1.5 text-xs text-red-500">{{ $message }}</p> @enderror
    </div>

    <div class="sm:col-span-2">
        <label for="description" class="mb-1.5 block text-sm font-medium text-heading">Description</label>
        <textarea id="description" name="description" rows="3" required
            placeholder="A short description of this service"
            class="w-full rounded-xl border border-heading/10 bg-page px-4 py-3 text-sm text-heading outline-none transition focus:border-primary focus:ring-2 focus:ring-primary/20 @error('description') border-red-400 @enderror">{{ old('description', $service->description ?? '') }}</textarea>
        @error('description') <p class="mt-1.5 text-xs text-red-500">{{ $message }}</p> @enderror
    </div>

    <div>
        <label for="sort_order" class="mb-1.5 block text-sm font-medium text-heading">Order</label>
        <input type="number" id="sort_order" name="sort_order" min="0" value="{{ old('sort_order', $service->sort_order ?? 0) }}" required
            class="w-full rounded-xl border border-heading/10 bg-page px-4 py-3 text-sm text-heading outline-none transition focus:border-primary focus:ring-2 focus:ring-primary/20 @error('sort_order') border-red-400 @enderror">
        <p class="mt-1.5 text-xs text-body">Lower numbers appear first.</p>
        @error('sort_order') <p class="mt-1.5 text-xs text-red-500">{{ $message }}</p> @enderror
    </div>
</div>
