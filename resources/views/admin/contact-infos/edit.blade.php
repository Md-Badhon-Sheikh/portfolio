@extends('layouts.admin')

@section('title', 'Edit Contact Info')

@section('content')
    <div class="mb-8">
        <h2 class="text-2xl font-bold text-heading">Edit Contact Info</h2>
        <p class="mt-1 text-sm text-body">Update this card in the About &rarr; Contact tab.</p>
    </div>

    <div class="card-surface max-w-2xl p-6 sm:p-8">
        <form action="{{ route('admin.contact-infos.update', $item) }}" method="POST" class="space-y-5">
            @csrf
            @method('PUT')
            @include('admin.contact-infos._form')

            <div class="flex items-center gap-3">
                <button type="submit" class="btn-primary">Save Changes</button>
                <a href="{{ route('admin.contact-infos.index') }}" class="text-sm font-medium text-body hover:text-primary">Cancel</a>
            </div>
        </form>
    </div>
@endsection
