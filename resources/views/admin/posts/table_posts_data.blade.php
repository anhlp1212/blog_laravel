@if (isset($posts))
    @foreach ($posts as $post)
        <tr>
            <th class="text-uppercase text-center text-secondary text-xxs font-weight-bolder opacity-7">
                {{ $post->id }}
            </th>
            <th class="text-uppercase text-center text-secondary text-xxs font-weight-bolder opacity-7">
                {{ $post->admin->name }}
            </th>
            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                {{ $post->title }}
            </th>
            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                {{ $post->image }}
            </th>
            <td class="text-center align-middle">
                @can('update', $post)
                    @if (Route::has('post.edit_post_page'))
                        <a href="{{ route('post.edit_post_page', $post->id) }}" class="btn btn-primary btn-sm"
                            id="{{ $post->id }}" data-toggle="tooltip" data-original-title="Update post">
                            Update
                        </a>
                    @endif
                @else
                    <a class="btn btn-primary btn-sm disabled" data-original-title="Update post">
                        Update
                    </a>
                @endcan
                @can('delete', $post)
                    @if (Route::has('post.delete_post'))
                        <a class="btn btn-info btn-sm delete_post" id="{{ $post->id }}" data-toggle="tooltip"
                            data-post-id="{{ $post->id }}" data-original-title="Delete post">
                            Delete
                        </a>
                    @endif
                @else
                    <a class="btn btn-info btn-sm disabled" data-original-title="Delete post">
                        Delete
                    </a>
                @endcan
            </td>
        </tr>
    @endforeach
@endif
