@extends('layouts.admin')

@section('title', 'About Slider Images')

@section('content')
    <div class="mb-8 flex items-center justify-between">
        <div>
            <h2 class="text-2xl font-bold text-heading">About Slider Images</h2>
            <p class="mt-1 text-sm text-body">Manage the images that slide in the About &rarr; Education and About &rarr; Bio tabs.</p>
        </div>
        <a href="{{ route('admin.about-images.create') }}" class="btn-primary">
            <svg class="h-4 w-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4"/></svg>
            Add Image
        </a>
    </div>

    @if ($images->isEmpty())
        <div class="card-surface p-8 text-center text-sm text-body">No images yet — the About sliders will be hidden until you add some.</div>
    @else
        @foreach (['education' => 'Education Tab', 'bio' => 'Bio Tab'] as $type => $label)
            @php $group = $images->where('type', $type); @endphp
            <div class="mb-10">
                <h3 class="mb-4 text-sm font-semibold uppercase tracking-wide text-body/70">{{ $label }}</h3>
                @if ($group->isEmpty())
                    <div class="card-surface p-6 text-center text-sm text-body">No images yet for this tab.</div>
                @else
                    <div class="grid grid-cols-2 gap-5 sm:grid-cols-3 lg:grid-cols-4">
                        @foreach ($group as $image)
                            <div class="card-surface overflow-hidden">
                                <img src="{{ $image->imageUrl() }}" alt="{{ $image->alt }}" class="h-36 w-full object-cover">
                                <div class="p-3">
                                    <p class="truncate text-xs text-body">{{ $image->alt ?: 'No alt text' }}</p>
                                    <p class="mt-0.5 text-xs text-body/70">Order: {{ $image->sort_order }}</p>
                                    <div class="mt-2 flex items-center gap-3">
                                        <a href="{{ route('admin.about-images.edit', $image) }}" class="text-xs font-medium text-primary hover:underline">Edit</a>
                                        <form action="{{ route('admin.about-images.destroy', $image) }}" method="POST" onsubmit="return confirm('Delete this image?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-xs font-medium text-red-600 hover:underline">Delete</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @endif
            </div>
        @endforeach
    @endif
@endsection
