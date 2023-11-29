@component('mail::message')
    The post has been added.
    @component('mail::panel')
        Thanks, {{ config('app.name') }}
    @endcomponent
@endcomponent
