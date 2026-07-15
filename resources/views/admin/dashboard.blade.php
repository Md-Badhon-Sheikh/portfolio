@extends('layouts.admin')

@section('title', 'Dashboard')

@section('content')
    <div class="mb-8">
        <h2 class="text-2xl font-bold text-heading">Welcome back, {{ auth()->user()->name }} 👋</h2>
        <p class="mt-1 text-sm text-body">Here's what's happening with your site.</p>
    </div>

    {{-- Stat cards --}}
    <div class="grid grid-cols-1 gap-6 sm:grid-cols-3">
        <div class="card-surface p-6">
            <div class="flex items-center gap-4">
                <div class="flex h-12 w-12 items-center justify-center rounded-full bg-primary/10 text-primary">
                    <svg class="h-6 w-6" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M4 4h16v12H7l-3 3V4z"/></svg>
                </div>
                <div>
                    <p class="text-2xl font-bold text-heading">{{ $stats['messages'] }}</p>
                    <p class="text-sm text-body">Total Messages</p>
                </div>
            </div>
        </div>

        <div class="card-surface p-6">
            <div class="flex items-center gap-4">
                <div class="flex h-12 w-12 items-center justify-center rounded-full bg-primary/10 text-primary">
                    <svg class="h-6 w-6" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                </div>
                <div>
                    <p class="text-2xl font-bold text-heading">{{ $stats['messages_this_week'] }}</p>
                    <p class="text-sm text-body">This Week</p>
                </div>
            </div>
        </div>

        <div class="card-surface p-6">
            <div class="flex items-center gap-4">
                <div class="flex h-12 w-12 items-center justify-center rounded-full bg-primary/10 text-primary">
                    <svg class="h-6 w-6" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24"><circle cx="12" cy="8" r="4"/><path stroke-linecap="round" stroke-linejoin="round" d="M4 20a8 8 0 0 1 16 0"/></svg>
                </div>
                <div>
                    <p class="text-2xl font-bold text-heading">{{ $stats['users'] }}</p>
                    <p class="text-sm text-body">Dashboard Users</p>
                </div>
            </div>
        </div>
    </div>

    {{-- Recent messages --}}
    <div class="mt-8 card-surface p-6">
        <h3 class="mb-4 text-lg font-bold text-heading">Recent Contact Messages</h3>

        @if ($recentMessages->isEmpty())
            <p class="text-sm text-body">No messages yet.</p>
        @else
            <div class="overflow-x-auto">
                <table class="w-full text-left text-sm">
                    <thead>
                        <tr class="border-b border-heading/10 text-heading/60">
                            <th class="pb-3 pr-4 font-medium">Name</th>
                            <th class="pb-3 pr-4 font-medium">Email</th>
                            <th class="pb-3 pr-4 font-medium">Subject</th>
                            <th class="pb-3 font-medium">Received</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-heading/5">
                        @foreach ($recentMessages as $message)
                            <tr>
                                <td class="py-3 pr-4 font-medium text-heading">{{ $message->name }}</td>
                                <td class="py-3 pr-4 text-body">{{ $message->email }}</td>
                                <td class="py-3 pr-4 text-body">{{ $message->subject }}</td>
                                <td class="py-3 text-body">{{ $message->created_at->diffForHumans() }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @endif
    </div>
@endsection
