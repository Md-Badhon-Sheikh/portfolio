@extends('layouts.admin')

@section('title', 'Hero Stats')

@section('content')
    <div class="mb-8 flex items-center justify-between">
        <div>
            <h2 class="text-2xl font-bold text-heading">Hero Stats</h2>
            <p class="mt-1 text-sm text-body">Manage the floating stats card shown under the homepage hero (e.g. Years, Projects, Support).</p>
        </div>
        <a href="{{ route('admin.stats.create') }}" class="btn-primary">
            <svg class="h-4 w-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4"/></svg>
            Add Stat
        </a>
    </div>

    <div class="card-surface overflow-hidden">
        @if ($stats->isEmpty())
            <p class="p-8 text-center text-sm text-body">No stats yet. Add one to populate the hero section.</p>
        @else
            <table class="w-full text-left text-sm">
                <thead class="border-b border-heading/10 text-xs uppercase tracking-wide text-body">
                    <tr>
                        <th class="px-6 py-4 font-medium">Order</th>
                        <th class="px-6 py-4 font-medium">Icon</th>
                        <th class="px-6 py-4 font-medium">Preview</th>
                        <th class="px-6 py-4 font-medium">Label</th>
                        <th class="px-6 py-4 font-medium text-right">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-heading/10">
                    @foreach ($stats as $stat)
                        <tr>
                            <td class="px-6 py-4 text-body">{{ $stat->sort_order }}</td>
                            <td class="px-6 py-4">
                                <span class="flex h-9 w-9 items-center justify-center rounded-full bg-[#F57C20] text-white">
                                    <svg class="h-4 w-4" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24">{!! $stat->svgPaths() !!}</svg>
                                </span>
                            </td>
                            <td class="px-6 py-4 font-semibold text-heading">{{ $stat->value }}{{ $stat->suffix }}</td>
                            <td class="px-6 py-4 text-body">{{ $stat->label }}</td>
                            <td class="px-6 py-4">
                                <div class="flex items-center justify-end gap-3">
                                    <a href="{{ route('admin.stats.edit', $stat) }}" class="text-sm font-medium text-primary hover:underline">Edit</a>
                                    <form action="{{ route('admin.stats.destroy', $stat) }}" method="POST" onsubmit="return confirm('Delete this stat?');">
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
