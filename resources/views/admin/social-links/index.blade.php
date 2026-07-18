@extends('layouts.admin')

@section('title', 'Social Links')

@section('content')
    <div class="mb-8 flex items-center justify-between">
        <div>
            <h2 class="text-2xl font-bold text-heading">Social Links</h2>
            <p class="mt-1 text-sm text-body">Manage the icons shown in the About &rarr; Contact tab.</p>
        </div>
        <a href="{{ route('admin.social-links.create') }}" class="btn-primary">
            <svg class="h-4 w-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4"/></svg>
            Add Link
        </a>
    </div>

    <div class="card-surface overflow-hidden">
        @if ($links->isEmpty())
            <p class="p-8 text-center text-sm text-body">No social links yet.</p>
        @else
            <table class="w-full text-left text-sm">
                <thead class="border-b border-heading/10 text-xs uppercase tracking-wide text-body">
                    <tr>
                        <th class="px-6 py-4 font-medium">Order</th>
                        <th class="px-6 py-4 font-medium">Platform</th>
                        <th class="px-6 py-4 font-medium">URL</th>
                        <th class="px-6 py-4 font-medium text-right">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-heading/10">
                    @foreach ($links as $link)
                        <tr>
                            <td class="px-6 py-4 text-body">{{ $link->sort_order }}</td>
                            <td class="px-6 py-4">
                                <div class="flex items-center gap-3">
                                    <span class="flex h-9 w-9 items-center justify-center rounded-lg text-white {{ $link->bgClass() }}">
                                        <svg class="h-4 w-4" fill="currentColor" viewBox="0 0 24 24">{!! $link->svgPaths() !!}</svg>
                                    </span>
                                    <span class="font-semibold text-heading">{{ $link->label() }}</span>
                                </div>
                            </td>
                            <td class="px-6 py-4 max-w-xs truncate text-body">{{ $link->url }}</td>
                            <td class="px-6 py-4">
                                <div class="flex items-center justify-end gap-3">
                                    <a href="{{ route('admin.social-links.edit', $link) }}" class="text-sm font-medium text-primary hover:underline">Edit</a>
                                    <form action="{{ route('admin.social-links.destroy', $link) }}" method="POST" onsubmit="return confirm('Delete this link?');">
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
