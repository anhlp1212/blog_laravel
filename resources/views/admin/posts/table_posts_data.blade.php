@if (isset($posts))
    @foreach ($posts as $post)
        <tr>
            <th class="text-uppercase text-center text-secondary text-xxs font-weight-bolder opacity-7">
                {{ $post->id  }}
            </th>
            <th class="text-uppercase text-center text-secondary text-xxs font-weight-bolder opacity-7">
                {{ $post->user_id }}
            </th>
            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                {{ $post->title }}
            </th>
            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                {{ $post->image }}
            </th>
            <td class="text-center align-middle">
                <a href="javascript:;" class="text-secondary font-weight-bold text-xs" data-toggle="tooltip"
                    data-original-title="Edit user">
                    Detial
                </a>
                |
                @if (Route::has('post.edit_post_page'))
                    <a href="{{ route('post.edit_post_page', $post->id) }}"
                        class="text-secondary font-weight-bold text-xs edit_sp" id="{{ $post->id }}"
                        data-toggle="tooltip" data-original-title="Update post">
                        Update
                    </a>
                @endif
                |
                @if (Route::has('post.delete_post'))
                    <a class="text-secondary font-weight-bold text-xs delete_post" id="{{ $post->id }}"
                        data-toggle="tooltip" data-post-id="{{ $post->id }}" data-original-title="Delete post">
                        Delete
                    </a>
                @endif
            </td>
        </tr>
    @endforeach
@endif
