@extends('layouts.admin')

@section('title', 'Edit Stat')

@section('content')
    <div class="mb-8">
        <h2 class="text-2xl font-bold text-heading">Edit Stat</h2>
        <p class="mt-1 text-sm text-body">Update this item in the homepage hero stats card.</p>
    </div>

    <div class="card-surface max-w-2xl p-6 sm:p-8">
        <form action="{{ route('admin.stats.update', $stat) }}" method="POST" class="space-y-5">
            @csrf
            @method('PUT')
            @include('admin.stats._form')

            <div class="flex items-center gap-3">
                <button type="submit" class="btn-primary">Save Changes</button>
                <a href="{{ route('admin.stats.index') }}" class="text-sm font-medium text-body hover:text-primary">Cancel</a>
            </div>
        </form>
    </div>
@endsection
