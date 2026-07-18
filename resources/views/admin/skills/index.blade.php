@extends('layouts.admin')

@section('title', 'Skills')

@section('content')
    <div class="mb-8 flex items-center justify-between">
        <div>
            <h2 class="text-2xl font-bold text-heading">Skills</h2>
            <p class="mt-1 text-sm text-body">Manage the "Why Choose Me" progress bars shown on the homepage.</p>
        </div>
        <a href="{{ route('admin.skills.create') }}" class="btn-primary">
            <svg class="h-4 w-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4"/></svg>
            Add Skill
        </a>
    </div>

    <div class="card-surface overflow-hidden">
        @if ($skills->isEmpty())
            <p class="p-8 text-center text-sm text-body">No skills yet.</p>
        @else
            <table class="w-full text-left text-sm">
                <thead class="border-b border-heading/10 text-xs uppercase tracking-wide text-body">
                    <tr>
                        <th class="px-6 py-4 font-medium">Order</th>
                        <th class="px-6 py-4 font-medium">Name</th>
                        <th class="px-6 py-4 font-medium">Level</th>
                        <th class="px-6 py-4 font-medium text-right">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-heading/10">
                    @foreach ($skills as $skill)
                        <tr>
                            <td class="px-6 py-4 text-body">{{ $skill->sort_order }}</td>
                            <td class="px-6 py-4 font-semibold text-heading">{{ $skill->name }}</td>
                            <td class="px-6 py-4">
                                <div class="flex items-center gap-3">
                                    <div class="h-2 w-32 overflow-hidden rounded-full bg-page">
                                        <div class="h-full rounded-full bg-primary" style="width: {{ $skill->level }}%"></div>
                                    </div>
                                    <span class="text-body">{{ $skill->level }}%</span>
                                </div>
                            </td>
                            <td class="px-6 py-4">
                                <div class="flex items-center justify-end gap-3">
                                    <a href="{{ route('admin.skills.edit', $skill) }}" class="text-sm font-medium text-primary hover:underline">Edit</a>
                                    <form action="{{ route('admin.skills.destroy', $skill) }}" method="POST" onsubmit="return confirm('Delete this skill?');">
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
