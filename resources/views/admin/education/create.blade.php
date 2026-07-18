@extends('layouts.admin')

@section('title', 'Add Education Entry')

@section('content')
    <div class="mb-8">
        <h2 class="text-2xl font-bold text-heading">Add Education Entry</h2>
        <p class="mt-1 text-sm text-body">Add a new block to the About &rarr; Education tab.</p>
    </div>

    <div class="card-surface max-w-2xl p-6 sm:p-8">
        <form action="{{ route('admin.education.store') }}" method="POST" enctype="multipart/form-data" class="space-y-5">
            @csrf
            @include('admin.education._form')

            <div class="flex items-center gap-3">
                <button type="submit" class="btn-primary">Save Entry</button>
                <a href="{{ route('admin.education.index') }}" class="text-sm font-medium text-body hover:text-primary">Cancel</a>
            </div>
        </form>
    </div>
@endsection
