{{-- Shared fields for create/edit social link forms --}}
@php $link = $link ?? null; @endphp

<div class="grid grid-cols-1 gap-5 sm:grid-cols-2">
    <div>
        <label for="platform" class="mb-1.5 block text-sm font-medium text-heading">Platform</label>
        <select id="platform" name="platform" required
            class="w-full rounded-xl border border-heading/10 bg-page px-4 py-3 text-sm text-heading outline-none transition focus:border-primary focus:ring-2 focus:ring-primary/20 @error('platform') border-red-400 @enderror">
            @foreach (\App\Models\SocialLink::platformMap() as $key => $meta)
                <option value="{{ $key }}" @selected(old('platform', $link->platform ?? 'facebook') === $key)>{{ $meta['label'] }}</option>
            @endforeach
        </select>
        @error('platform') <p class="mt-1.5 text-xs text-red-500">{{ $message }}</p> @enderror
    </div>

    <div>
        <label for="sort_order" class="mb-1.5 block text-sm font-medium text-heading">Order</label>
        <input type="number" id="sort_order" name="sort_order" min="0" value="{{ old('sort_order', $link->sort_order ?? 0) }}" required
            class="w-full rounded-xl border border-heading/10 bg-page px-4 py-3 text-sm text-heading outline-none transition focus:border-primary focus:ring-2 focus:ring-primary/20 @error('sort_order') border-red-400 @enderror">
        <p class="mt-1.5 text-xs text-body">Lower numbers appear first.</p>
        @error('sort_order') <p class="mt-1.5 text-xs text-red-500">{{ $message }}</p> @enderror
    </div>

    <div class="sm:col-span-2">
        <label for="url" class="mb-1.5 block text-sm font-medium text-heading">URL</label>
        <input type="text" id="url" name="url" value="{{ old('url', $link->url ?? '') }}" required
            placeholder="https://facebook.com/yourprofile"
            class="w-full rounded-xl border border-heading/10 bg-page px-4 py-3 text-sm text-heading outline-none transition focus:border-primary focus:ring-2 focus:ring-primary/20 @error('url') border-red-400 @enderror">
        @error('url') <p class="mt-1.5 text-xs text-red-500">{{ $message }}</p> @enderror
    </div>
</div>
