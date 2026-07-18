@extends('layouts.admin')

@section('title', 'Edit Skill')

@section('content')
    <div class="mb-8">
        <h2 class="text-2xl font-bold text-heading">Edit Skill</h2>
        <p class="mt-1 text-sm text-body">Update this progress bar in the homepage "Why Choose Me" section.</p>
    </div>

    <div class="card-surface max-w-2xl p-6 sm:p-8">
        <form action="{{ route('admin.skills.update', $skill) }}" method="POST" class="space-y-5">
            @csrf
            @method('PUT')
            @include('admin.skills._form')

            <div class="flex items-center gap-3">
                <button type="submit" class="btn-primary">Save Changes</button>
                <a href="{{ route('admin.skills.index') }}" class="text-sm font-medium text-body hover:text-primary">Cancel</a>
            </div>
        </form>
    </div>
@endsection
