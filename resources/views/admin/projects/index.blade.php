@extends('layouts.admin')

@section('title', 'Portfolio')

@section('content')
    <div class="mb-8 flex items-center justify-between">
        <div>
            <h2 class="text-2xl font-bold text-heading">Portfolio</h2>
            <p class="mt-1 text-sm text-body">Manage the project cards and filter tags shown on the homepage.</p>
        </div>
        <a href="{{ route('admin.projects.create') }}" class="btn-primary">
            <svg class="h-4 w-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4"/></svg>
            Add Project
        </a>
    </div>

    <div class="card-surface overflow-hidden">
        @if ($projects->isEmpty())
            <p class="p-8 text-center text-sm text-body">No projects yet.</p>
        @else
            <table class="w-full text-left text-sm">
                <thead class="border-b border-heading/10 text-xs uppercase tracking-wide text-body">
                    <tr>
                        <th class="px-6 py-4 font-medium">Order</th>
                        <th class="px-6 py-4 font-medium">Thumbnail</th>
                        <th class="px-6 py-4 font-medium">Title</th>
                        <th class="px-6 py-4 font-medium">Tags</th>
                        <th class="px-6 py-4 font-medium text-right">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-heading/10">
                    @foreach ($projects as $project)
                        <tr>
                            <td class="px-6 py-4 text-body">{{ $project->sort_order }}</td>
                            <td class="px-6 py-4">
                                @if ($project->imageUrl())
                                    <img src="{{ $project->imageUrl() }}" alt="{{ $project->title }}" class="h-10 w-16 rounded-lg object-cover">
                                @else
                                    <span class="flex h-10 w-16 items-center justify-center rounded-lg bg-page text-body/50">—</span>
                                @endif
                            </td>
                            <td class="px-6 py-4 font-semibold text-heading">{{ $project->title }}</td>
                            <td class="px-6 py-4">
                                <div class="flex flex-wrap gap-1.5">
                                    @foreach ($project->tagList() as $tag)
                                        <span class="rounded-full bg-primary/10 px-2.5 py-1 text-xs font-medium text-primary">{{ $tag }}</span>
                                    @endforeach
                                </div>
                            </td>
                            <td class="px-6 py-4">
                                <div class="flex items-center justify-end gap-3">
                                    <a href="{{ route('admin.projects.edit', $project) }}" class="text-sm font-medium text-primary hover:underline">Edit</a>
                                    <form action="{{ route('admin.projects.destroy', $project) }}" method="POST" onsubmit="return confirm('Delete this project?');">
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
