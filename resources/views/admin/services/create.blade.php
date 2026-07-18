@extends('layouts.admin')

@section('title', 'Add Service')

@section('content')
    <div class="mb-8">
        <h2 class="text-2xl font-bold text-heading">Add Service</h2>
        <p class="mt-1 text-sm text-body">Add a new card to the homepage services section.</p>
    </div>

    <div class="card-surface max-w-2xl p-6 sm:p-8">
        <form action="{{ route('admin.services.store') }}" method="POST" class="space-y-5">
            @csrf
            @include('admin.services._form')

            <div class="flex items-center gap-3">
                <button type="submit" class="btn-primary">Save Service</button>
                <a href="{{ route('admin.services.index') }}" class="text-sm font-medium text-body hover:text-primary">Cancel</a>
            </div>
        </form>
    </div>
@endsection
