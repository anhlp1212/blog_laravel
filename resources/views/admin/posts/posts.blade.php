<!DOCTYPE html>
<html lang="en">

<head>
    @include('admin.layouts.header_post')

    <script src="{{ mix('/js/app.js') }}"></script>
    {{-- Em xin phep dung link de thu nghiem truoc, thay ap dung duoc em se import thu vien vao --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"
        integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</head>

<body class="g-sidenav-show  bg-gray-200">
    <div id="toast"></div>

    @include('admin.layouts.aside')
    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
        <!-- Navbar -->
        @include('admin.layouts.nav_bar')
        <!-- End Navbar -->
        <div class="container-fluid py-4">
            <div class="row">
                <div class="col-12">
                    <div class="card my-4">
                        <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                            <div class="shadow-primary border-radius-lg pt-4 pb-3"
                                style="display:flex;justify-content: space-between;flex-wrap: nowrap;">
                                <h6 class="text-capitalize ps-3">Search</h6>
                                @if (Route::has('post.add_post_page'))
                                    <a href="{{ route('post.add_post_page') }}">
                                        <button type="button" id="btn_add_sp"
                                            class="btn btn-outline-primary btn-sm mb-0"
                                            style="margin-right: 15px;">Add</button>
                                    </a>
                                @endif
                            </div>
                        </div>
                        <div class="card-body px-0 pb-2">
                            <div class="table-responsive p-0">
                                <table class="table align-items-center mb-0">
                                    <thead>
                                        <tr>
                                            <th
                                                class="text-uppercase text-center text-xxs font-weight-bolder opacity-7">
                                                STT</th>
                                            <th
                                                class="text-uppercase text-center text-secondary text-xxs font-weight-bolder opacity-7">
                                                UserID</th>
                                            <th
                                                class="text-uppercase text-center text-xxs font-weight-bolder opacity-7 ps-2">
                                                Title</th>
                                            <th
                                                class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                Image</th>
                                            <th class="text-secondary opacity-7"></th>
                                        </tr>
                                    </thead>
                                    <tbody class="table-tbody-sp">
                                        @if (isset($posts))
                                            <?php $count = 1; ?>
                                            @foreach ($posts as $post)
                                                <tr>
                                                    <th
                                                        class="text-uppercase text-center text-secondary text-xxs font-weight-bolder opacity-7">
                                                        {{ $count++ }}</th>
                                                    <th
                                                        class="text-uppercase text-center text-secondary text-xxs font-weight-bolder opacity-7">
                                                        {{ $post->user_id }}</th>
                                                    <th
                                                        class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                                        {{ $post->title }}</th>
                                                    <th
                                                        class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                        {{ $post->image }}</th>
                                                    <td class="text-center align-middle">
                                                        <a href="javascript:;"
                                                            class="text-secondary font-weight-bold text-xs"
                                                            data-toggle="tooltip" data-original-title="Edit user">
                                                            Detial
                                                        </a>
                                                        |
                                                        @if (Route::has('post.edit_post_page'))
                                                            <a href="{{ route('post.edit_post_page', $post->id) }}"
                                                                class="text-secondary font-weight-bold text-xs edit_sp"
                                                                id="{{ $post->id }}" data-toggle="tooltip"
                                                                data-original-title="Update post">
                                                                Update
                                                            </a>
                                                        @endif
                                                        |
                                                        @if (Route::has('post.delete_post'))
                                                            <a class="text-secondary font-weight-bold text-xs delete_post"
                                                                id="{{ $post->id }}" data-toggle="tooltip"
                                                                onclick="confirmation(event)"
                                                                href="{{ route('post.delete_post', $post->id) }}"
                                                                data-original-title="Delete post">
                                                                Delete
                                                            </a>
                                                            {{-- onclick="return confirm('Are you sure?')" --}}
                                                            {{-- href="{{ route('post.delete_post', $post->id) }}" --}}
                                                        @endif
                                                    </td>
                                                </tr>
                                            @endforeach
                                        @endif
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <footer class="footer py-4  ">
                <div class="container-fluid">
                </div>
            </footer>
        </div>
    </main>
    @include('admin.layouts.footer_post')

    <script>
        function confirmation(event) {
            event.preventDefault();
            var urlToRedirect = event.currentTarget.getAttribute('href');
            swal({
                title: "Are you sure?",
                text: "We are going to delete this post",
                dangerMode: true,
                cancelButtonClass: 'red',
            })
            .then((willCancel)=>{
                window.location.href = urlToRedirect;
            });
        }
    </script>
</body>

</html>
