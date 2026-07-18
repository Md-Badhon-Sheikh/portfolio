@extends('layouts.admin')

@section('title', 'Edit Service')

@section('content')
    <div class="mb-8">
        <h2 class="text-2xl font-bold text-heading">Edit Service</h2>
        <p class="mt-1 text-sm text-body">Update this card in the homepage services section.</p>
    </div>

    <div class="card-surface max-w-2xl p-6 sm:p-8">
        <form action="{{ route('admin.services.update', $service) }}" method="POST" class="space-y-5">
            @csrf
            @method('PUT')
            @include('admin.services._form')

            <div class="flex items-center gap-3">
                <button type="submit" class="btn-primary">Save Changes</button>
                <a href="{{ route('admin.services.index') }}" class="text-sm font-medium text-body hover:text-primary">Cancel</a>
            </div>
        </form>
    </div>
@endsection
