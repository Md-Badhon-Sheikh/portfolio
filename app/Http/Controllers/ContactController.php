<?php

namespace App\Http\Controllers;

use App\Mail\ContactMessageReceived;
use App\Models\ContactMessage;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    /**
     * Store a contact form submission.
     */
    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:100'],
            'email' => ['required', 'email', 'max:150'],
            'subject' => ['required', 'string', 'max:150'],
            'message' => ['required', 'string', 'max:2000'],
        ]);

        $contactMessage = ContactMessage::create($validated);

        // The message is already saved regardless of what happens below —
        // a flaky SMTP connection shouldn't cost the visitor their submission.
        $recipient = User::first()?->email ?? config('mail.from.address');

        if ($recipient) {
            try {
                Mail::to($recipient)->send(new ContactMessageReceived($contactMessage));
            } catch (\Throwable $e) {
                Log::error('Failed to send contact message notification email.', [
                    'contact_message_id' => $contactMessage->id,
                    'error' => $e->getMessage(),
                ]);
            }
        }

        return back()->with('success', "Thanks, {$validated['name']}! Your message has been sent — I'll get back to you soon.");
    }
}
