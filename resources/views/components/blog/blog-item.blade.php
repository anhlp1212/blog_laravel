@if (Route::has('showPost'))
    <a class="no-underline transition block border border-lighter w-full mb-10 p-5 rounded post-card" href="{{ route('showPost', $post->id) }}">
        <div class="block h-post-card-image bg-cover bg-center bg-no-repeat w-full h-48 mb-5"
            style="background-image: url('{{ $post->image ?? '' }}')">
        </div>
        <div class="flex flex-col justify-between flex-1">
            <div>
                <h2 class="text-3xl font-sans font-bold leading-normal block mb-6">
                    {{ $post->title ?? '' }}
                </h2>

                <p class="leading-normal mb-6 font-serif leading-loose">
                    {{ $post->excerpt ?? '' }}
                </p>
            </div>

            <div class="flex items-center text-sm text-light">
                <span class="ml-2">
                    {{ $post->admin->name }}
                </span>
                <span class="ml-auto">
                    {{ $post->created_at ?? '' }} &#x2022;
                </span>
            </div>
        </div>
    </a>
@endif