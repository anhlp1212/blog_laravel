@extends('layouts.app')

@section('content')
    <div class="container mx-auto px-5 max-w-3xl">
        @if (isset($posts))
            @foreach ($posts as $post)
                <x-blog.blog-item :post="$post" />
            @endforeach
        @else
            <div>Currently unavailable</div>
        @endif

        <div class="uppercase flex-1 py-5 font-sans">
            {!! $posts->links() !!}
        </div>
    </div>
@endsection
