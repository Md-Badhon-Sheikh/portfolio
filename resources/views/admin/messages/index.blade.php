@extends('layouts.admin')

@section('title', 'Messages')

@section('content')
    <div class="mb-8">
        <h2 class="text-2xl font-bold text-heading">Messages</h2>
        <p class="mt-1 text-sm text-body">Contact form submissions from your portfolio.</p>
    </div>

    <div class="card-surface overflow-hidden">
        @if ($messages->isEmpty())
            <p class="p-8 text-center text-sm text-body">No messages yet.</p>
        @else
            <table class="w-full text-left text-sm">
                <thead class="border-b border-heading/10 text-xs uppercase tracking-wide text-body">
                    <tr>
                        <th class="px-6 py-4 font-medium"></th>
                        <th class="px-6 py-4 font-medium">Name</th>
                        <th class="px-6 py-4 font-medium">Email</th>
                        <th class="px-6 py-4 font-medium">Subject</th>
                        <th class="px-6 py-4 font-medium">Received</th>
                        <th class="px-6 py-4 font-medium text-right">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-heading/10">
                    @foreach ($messages as $message)
                        <tr class="{{ $message->isUnread() ? 'bg-primary/5' : '' }}">
                            <td class="px-6 py-4">
                                @if ($message->isUnread())
                                    <span class="block h-2 w-2 rounded-full bg-primary" title="Unread"></span>
                                @endif
                            </td>
                            <td class="px-6 py-4 {{ $message->isUnread() ? 'font-bold' : 'font-medium' }} text-heading">{{ $message->name }}</td>
                            <td class="px-6 py-4 text-body">{{ $message->email }}</td>
                            <td class="px-6 py-4 text-body">{{ $message->subject }}</td>
                            <td class="px-6 py-4 text-body">{{ $message->created_at->diffForHumans() }}</td>
                            <td class="px-6 py-4">
                                <div class="flex items-center justify-end gap-3">
                                    <a href="{{ route('admin.messages.show', $message) }}" class="text-sm font-medium text-primary hover:underline">View</a>
                                    <form action="{{ route('admin.messages.destroy', $message) }}" method="POST" onsubmit="return confirm('Delete this message?');">
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

            <div class="border-t border-heading/10 px-6 py-4">
                {{ $messages->links() }}
            </div>
        @endif
    </div>
@endsection
