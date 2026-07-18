{{-- Shared fields for create/edit project forms --}}
@php $project = $project ?? null; @endphp

<div class="space-y-5">
    <div>
        <label for="image" class="mb-1.5 block text-sm font-medium text-heading">Thumbnail</label>
        @if ($project?->imageUrl())
            <img src="{{ $project->imageUrl() }}" alt="{{ $project->title }}" class="mb-2 h-24 w-40 rounded-lg object-cover">
        @endif
        <input type="file" id="image" name="image" accept="image/*"
            class="w-full text-sm text-body file:mr-3 file:rounded-lg file:border-0 file:bg-primary/10 file:px-3 file:py-2 file:text-sm file:font-medium file:text-primary hover:file:bg-primary/20">
        <p class="mt-1.5 text-xs text-body">Leave blank to keep a placeholder icon on the homepage.</p>
        @error('image') <p class="mt-1.5 text-xs text-red-500">{{ $message }}</p> @enderror
    </div>

    <div>
        <label for="title" class="mb-1.5 block text-sm font-medium text-heading">Title</label>
        <input type="text" id="title" name="title" value="{{ old('title', $project->title ?? '') }}" required
            placeholder="E-Commerce Platform"
            class="w-full rounded-xl border border-heading/10 bg-page px-4 py-3 text-sm text-heading outline-none transition focus:border-primary focus:ring-2 focus:ring-primary/20 @error('title') border-red-400 @enderror">
        @error('title') <p class="mt-1.5 text-xs text-red-500">{{ $message }}</p> @enderror
    </div>

    <div>
        <label for="tags" class="mb-1.5 block text-sm font-medium text-heading">Tags</label>
        <input type="text" id="tags" name="tags" value="{{ old('tags', $project->tags ?? '') }}" required
            placeholder="Laravel, Dashboard"
            class="w-full rounded-xl border border-heading/10 bg-page px-4 py-3 text-sm text-heading outline-none transition focus:border-primary focus:ring-2 focus:ring-primary/20 @error('tags') border-red-400 @enderror">
        <p class="mt-1.5 text-xs text-body">Comma-separated. The first tag is the badge shown on hover; all of them power the homepage filter buttons.</p>
        @error('tags') <p class="mt-1.5 text-xs text-red-500">{{ $message }}</p> @enderror
    </div>

    <div class="grid grid-cols-1 gap-5 sm:grid-cols-2">
        <div>
            <label for="url" class="mb-1.5 block text-sm font-medium text-heading">Project URL</label>
            <input type="text" id="url" name="url" value="{{ old('url', $project->url ?? '') }}"
                placeholder="https://example.com"
                class="w-full rounded-xl border border-heading/10 bg-page px-4 py-3 text-sm text-heading outline-none transition focus:border-primary focus:ring-2 focus:ring-primary/20 @error('url') border-red-400 @enderror">
            @error('url') <p class="mt-1.5 text-xs text-red-500">{{ $message }}</p> @enderror
        </div>

        <div>
            <label for="sort_order" class="mb-1.5 block text-sm font-medium text-heading">Order</label>
            <input type="number" id="sort_order" name="sort_order" min="0" value="{{ old('sort_order', $project->sort_order ?? 0) }}" required
                class="w-full rounded-xl border border-heading/10 bg-page px-4 py-3 text-sm text-heading outline-none transition focus:border-primary focus:ring-2 focus:ring-primary/20 @error('sort_order') border-red-400 @enderror">
            <p class="mt-1.5 text-xs text-body">Lower numbers appear first.</p>
            @error('sort_order') <p class="mt-1.5 text-xs text-red-500">{{ $message }}</p> @enderror
        </div>
    </div>
</div>
