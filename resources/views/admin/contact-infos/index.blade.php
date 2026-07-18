@extends('layouts.admin')

@section('title', 'Contact Info')

@section('content')
    <div class="mb-8 flex items-center justify-between">
        <div>
            <h2 class="text-2xl font-bold text-heading">Contact Info</h2>
            <p class="mt-1 text-sm text-body">Manage the cards shown in the About &rarr; Contact tab.</p>
        </div>
        <a href="{{ route('admin.contact-infos.create') }}" class="btn-primary">
            <svg class="h-4 w-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4"/></svg>
            Add Card
        </a>
    </div>

    <div class="card-surface overflow-hidden">
        @if ($items->isEmpty())
            <p class="p-8 text-center text-sm text-body">No contact info cards yet.</p>
        @else
            <table class="w-full text-left text-sm">
                <thead class="border-b border-heading/10 text-xs uppercase tracking-wide text-body">
                    <tr>
                        <th class="px-6 py-4 font-medium">Order</th>
                        <th class="px-6 py-4 font-medium">Icon</th>
                        <th class="px-6 py-4 font-medium">Title</th>
                        <th class="px-6 py-4 font-medium">Details</th>
                        <th class="px-6 py-4 font-medium text-right">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-heading/10">
                    @foreach ($items as $item)
                        <tr>
                            <td class="px-6 py-4 text-body">{{ $item->sort_order }}</td>
                            <td class="px-6 py-4">
                                <span class="flex h-9 w-9 items-center justify-center rounded-full bg-primary/10 text-primary">
                                    <svg class="h-4 w-4" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24">{!! $item->svgPaths() !!}</svg>
                                </span>
                            </td>
                            <td class="px-6 py-4 font-semibold text-heading">{{ $item->title }}</td>
                            <td class="px-6 py-4 max-w-xs truncate text-body">{{ $item->details }}</td>
                            <td class="px-6 py-4">
                                <div class="flex items-center justify-end gap-3">
                                    <a href="{{ route('admin.contact-infos.edit', $item) }}" class="text-sm font-medium text-primary hover:underline">Edit</a>
                                    <form action="{{ route('admin.contact-infos.destroy', $item) }}" method="POST" onsubmit="return confirm('Delete this card?');">
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
