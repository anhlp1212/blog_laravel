@component('mail::message')
    This post has been updated.
    @component('mail::panel')
        Thanks, {{ config('app.name') }}
    @endcomponent
@endcomponent
