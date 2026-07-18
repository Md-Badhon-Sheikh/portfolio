<x-mail::message>
# New message from your portfolio

You've received a new contact form submission.

<x-mail::table>
| | |
|:--|:--|
| **Name** | {{ $contactMessage->name }} |
| **Email** | {{ $contactMessage->email }} |
| **Subject** | {{ $contactMessage->subject }} |
</x-mail::table>

{{ $contactMessage->message }}

<x-mail::button :url="route('admin.messages.show', $contactMessage)">
View in Admin Panel
</x-mail::button>

Thanks,<br>
{{ config('app.name') }}
</x-mail::message>
