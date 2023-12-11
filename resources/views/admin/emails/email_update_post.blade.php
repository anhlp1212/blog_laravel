@if (isset($post))
    @component('mail::message')
        This post "{{ $post->title }}" with id = {{ $post->id }} has been updated.
        @component('mail::button', ['url' => route('showPost', $post->id)])
            Show post
        @endcomponent
        @component('mail::panel')
            Thanks, {{ config('app.name') }}
        @endcomponent
    @endcomponent
@else
    @component('mail::message')
        # Currently unavailable
    @endcomponent
@endif
