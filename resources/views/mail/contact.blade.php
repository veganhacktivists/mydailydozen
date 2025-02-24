<x-mail::message>
# {{ $subject }}

- Name: {{ $ticket->first_name}} {{ $ticket->last_name }}
- Email: {{ $ticket->email }}

<x-mail::panel>
{{ $ticket->message }}
</x-mail::panel>

</x-mail::message>
