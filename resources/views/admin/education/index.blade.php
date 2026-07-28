@extends('layouts.admin')

@section('title', 'Education')

@section('content')
    <div class="mb-8 flex items-center justify-between">
        <div>
            <h2 class="text-2xl font-bold text-heading">Education</h2>
            <p class="mt-1 text-sm text-body">Manage the entries shown in the About &rarr; Education tab.</p>
        </div>
        <a href="{{ route('admin.education.create') }}" class="btn-primary">
            <svg class="h-4 w-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4"/></svg>
            Add Entry
        </a>
    </div>

    <div class="card-surface overflow-hidden">
        @if ($entries->isEmpty())
            <p class="p-8 text-center text-sm text-body">No education entries yet.</p>
        @else
            <table class="w-full text-left text-sm">
                <thead class="border-b border-heading/10 text-xs uppercase tracking-wide text-body">
                    <tr>
                        <th class="px-6 py-4 font-medium">Order</th>
                        <th class="px-6 py-4 font-medium">Title</th>
                        <th class="px-6 py-4 font-medium">Details</th>
                        <th class="px-6 py-4 font-medium text-right">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-heading/10">
                    @foreach ($entries as $entry)
                        <tr>
                            <td class="px-6 py-4 text-body">{{ $entry->sort_order }}</td>
                           
                            <td class="px-6 py-4 font-semibold text-heading">{{ $entry->title }}</td>
                            <td class="px-6 py-4 max-w-md truncate text-body">{{ str_replace("\n", ' · ', $entry->details) }}</td>
                            <td class="px-6 py-4">
                                <div class="flex items-center justify-end gap-3">
                                    <a href="{{ route('admin.education.edit', $entry) }}" class="text-sm font-medium text-primary hover:underline">Edit</a>
                                    <form action="{{ route('admin.education.destroy', $entry) }}" method="POST" onsubmit="return confirm('Delete this entry?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-sm font-medium text-red-600 hover:underline">Delete</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>
@endsection
