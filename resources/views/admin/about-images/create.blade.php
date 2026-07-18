@extends('layouts.admin')

@section('title', 'Add Bio Slider Image')

@section('content')
    <div class="mb-8">
        <h2 class="text-2xl font-bold text-heading">Add Bio Slider Image</h2>
        <p class="mt-1 text-sm text-body">Add a new slide to the About &rarr; Bio tab.</p>
    </div>

    <div class="card-surface max-w-xl p-6 sm:p-8">
        <form action="{{ route('admin.about-images.store') }}" method="POST" enctype="multipart/form-data" class="space-y-5">
            @csrf
            @include('admin.about-images._form')

            <div class="flex items-center gap-3">
                <button type="submit" class="btn-primary">Save Image</button>
                <a href="{{ route('admin.about-images.index') }}" class="text-sm font-medium text-body hover:text-primary">Cancel</a>
            </div>
        </form>
    </div>
@endsection
