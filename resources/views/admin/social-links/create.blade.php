@extends('layouts.admin')

@section('title', 'Add Social Link')

@section('content')
    <div class="mb-8">
        <h2 class="text-2xl font-bold text-heading">Add Social Link</h2>
        <p class="mt-1 text-sm text-body">Add a new icon to the About &rarr; Contact tab.</p>
    </div>

    <div class="card-surface max-w-xl p-6 sm:p-8">
        <form action="{{ route('admin.social-links.store') }}" method="POST" class="space-y-5">
            @csrf
            @include('admin.social-links._form')

            <div class="flex items-center gap-3">
                <button type="submit" class="btn-primary">Save Link</button>
                <a href="{{ route('admin.social-links.index') }}" class="text-sm font-medium text-body hover:text-primary">Cancel</a>
            </div>
        </form>
    </div>
@endsection
