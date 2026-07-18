@extends('layouts.admin')

@section('title', 'Message from '.$message->name)

@section('content')
    <div class="mb-8 flex items-center justify-between">
        <div>
            <a href="{{ route('admin.messages.index') }}" class="mb-2 inline-flex items-center gap-1.5 text-sm font-medium text-body hover:text-primary">
                <svg class="h-4 w-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7"/></svg>
                Back to Messages
            </a>
            <h2 class="text-2xl font-bold text-heading">{{ $message->subject }}</h2>
            <p class="mt-1 text-sm text-body">From {{ $message->name }} &lt;{{ $message->email }}&gt; &middot; {{ $message->created_at->format('M j, Y \a\t g:i A') }}</p>
        </div>
        <div class="flex items-center gap-3">
            <a href="mailto:{{ $message->email }}?subject={{ rawurlencode('Re: '.$message->subject) }}" class="btn-primary">
                <svg class="h-4 w-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                Reply by Email
            </a>
            <form action="{{ route('admin.messages.destroy', $message) }}" method="POST" onsubmit="return confirm('Delete this message?');">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn-outline !border-red-200 !text-red-600 hover:!border-red-400">Delete</button>
            </form>
        </div>
    </div>

    <div class="card-surface max-w-3xl p-6 sm:p-8">
        <p class="whitespace-pre-line leading-relaxed text-body">{{ $message->message }}</p>
    </div>
@endsection
