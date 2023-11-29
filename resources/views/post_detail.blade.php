@extends('layouts.app')

@section('content')
    <div class="container mx-auto px-5 lg:max-w-screen-lg mt-20">
        <h1 class="mb-5 text-3xl font-sans font-bold leading-normal block">{{ $post->title ?? '' }}</h1>

        <div class="flex items-center text-sm text-light">
            <span>{{ $post->created_at ?? '' }} &#x2022;
            </span>

            @if (isset($post->tags))
                @foreach ($post->tags as $tag)
                    <x-tag.tag-item :tag="$tag->name" />
                @endforeach
            @endif

        </div>

        <div class="mt-5 leading-loose flex flex-col justify-center items-center post-body font-serif">
            {!! $post->description ?? '' !!}
        </div>

        <div class="mt-10 lg:flex items-center p-5 border border-lighter  rounded">
            <div class="lg:pl-5 leading-loose text-center lg:text-left text-text-color w-full lg:w-5/6">
                By <span class="font-bold">{{ $post->admin->name ?? '' }}</span>
            </div>
        </div>
    </div>
@endsection
