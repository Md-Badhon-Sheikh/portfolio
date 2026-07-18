@extends('layouts.admin')

@section('title', 'Add Project')

@section('content')
    <div class="mb-8">
        <h2 class="text-2xl font-bold text-heading">Add Project</h2>
        <p class="mt-1 text-sm text-body">Add a new card to the homepage portfolio section.</p>
    </div>

    <div class="card-surface max-w-2xl p-6 sm:p-8">
        <form action="{{ route('admin.projects.store') }}" method="POST" enctype="multipart/form-data" class="space-y-5">
            @csrf
            @include('admin.projects._form')

            <div class="flex items-center gap-3">
                <button type="submit" class="btn-primary">Save Project</button>
                <a href="{{ route('admin.projects.index') }}" class="text-sm font-medium text-body hover:text-primary">Cancel</a>
            </div>
        </form>
    </div>
@endsection
