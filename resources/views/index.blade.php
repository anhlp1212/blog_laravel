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

        <div class="uppercase flex items-center justify-center flex-1 py-5 font-sans">
            <a href="#" rel="next" class="block no-underline text-light hover:text-black px-5">Check More
                Articles</a>
        </div>
    </div>
@endsection
