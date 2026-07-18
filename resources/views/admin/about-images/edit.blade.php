@extends('layouts.admin')

@section('title', 'Edit Bio Slider Image')

@section('content')
    <div class="mb-8">
        <h2 class="text-2xl font-bold text-heading">Edit Bio Slider Image</h2>
        <p class="mt-1 text-sm text-body">Update this slide in the About &rarr; Bio tab.</p>
    </div>

    <div class="card-surface max-w-xl p-6 sm:p-8">
        <form action="{{ route('admin.about-images.update', $image) }}" method="POST" enctype="multipart/form-data" class="space-y-5">
            @csrf
            @method('PUT')
            @include('admin.about-images._form')

            <div class="flex items-center gap-3">
                <button type="submit" class="btn-primary">Save Changes</button>
                <a href="{{ route('admin.about-images.index') }}" class="text-sm font-medium text-body hover:text-primary">Cancel</a>
            </div>
        </form>
    </div>
@endsection
