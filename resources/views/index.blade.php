@extends('layouts.app')

@section('content')
    <div class="space-y-2 pt-6 pb-8 md:space-y-5">
        <div class="divide-y divide-gray-200 dark:divide-gray-700">
            @foreach ($posts as $post)
                <x-blog.blog-item :post="$post" />
            @endforeach
        </div>
    </div>
@endsection
