<!DOCTYPE html>
<html lang="en">

<head>
    @include('admin.layouts.header_post')
    <script src="{{ mix('js/app.js') }}"></script>

</head>

<body class="g-sidenav-show  bg-gray-200">
    <div id="toast"></div>

    @include('admin.layouts.aside')
    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
        <!-- Navbar -->
        @include('admin.layouts.nav_bar')
        <!-- End Navbar -->
        <div class="container-fluid py-1">
            <div class="row">
                <div class="col-12">
                    @if (Route::has('user.add_user_page'))
                        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                            <a href="{{ route('user.add_user_page') }}">
                                <button type="button" id="btn_add_sp"
                                    class="btn btn-outline-primary mb-0 me-md-2 bg-white">Add</button>
                            </a>
                        </div>
                    @endif
                    <div class="card my-4">
                        <div class="card-body px-0 pb-2">
                            <div class="table-responsive p-0">
                                <table class="table align-items-center mb-0">
                                    <thead>
                                        <tr>
                                            <th
                                                class="text-uppercase text-center text-xxs font-weight-bolder opacity-7">
                                                ID</th>
                                            <th
                                                class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                Name</th>
                                            <th class="text-uppercase text-xxs font-weight-bolder opacity-7 ps-2">
                                                Email</th>
                                            <th
                                                class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                Roles</th>
                                            <th class="text-secondary opacity-7"></th>
                                        </tr>
                                    </thead>
                                    <tbody class="table-tbody-sp">
                                        @if (isset($users))
                                            @foreach ($users as $user)
                                                <tr>
                                                    <th
                                                        class="text-uppercase text-center text-secondary text-xxs font-weight-bolder opacity-7">
                                                        {{ $user->id }}
                                                    </th>
                                                    <th
                                                        class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                        {{ $user->name }}
                                                    </th>
                                                    <th
                                                        class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                                        {{ $user->email }}
                                                    </th>
                                                    <th
                                                        class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                        {{ $user->role->name }}
                                                    </th>
                                                    <td class="text-center align-middle">
                                                        <a class="btn btn-success btn-sm"
                                                            href="{{ route('user.detail', $user->id) }}">Show</a>
                                                        <a class="btn btn-info btn-sm" href="#">Edit</a>
                                                        <a class="btn btn-primary btn-sm" href="#">Delete</a>
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

        {{-- Popup confirm --}}
        @include('layouts.confirm')

        {{-- Popup toast  --}}
        @include('layouts.toast')

    </main>
    @include('admin.layouts.footer_post')

    <script>
        $(".delete_post").on("click", function(event) {
            var post_id = $(this).attr("id");
            $("#mi-modal").modal('show');

            // Yes
            $("#modal-btn-yes").on("click", function() {
                $.ajax({
                    url: "/admin/posts/delete_post/" + post_id,
                    method: "DELETE",
                    success: function(response) {
                        event.target.parentElement.parentElement.remove();
                        $('#messageAjax').html(response.message)
                        const listClass = document.getElementById("liveToast").classList;
                        if (response.status == "success") {
                            listClass.remove("text-bg-error");
                            listClass.toggle("text-bg-success");
                        } else {
                            listClass.remove("text-bg-success");
                            listClass.toggle("text-bg-error");
                        }
                        $("#liveToast").toast({
                            animation: false,
                            autohide: true,
                            delay: 3000
                        }).toast('show');
                    },
                    error: function(error) {
                        console.error("Error deleting post:", error);
                    }
                });
                $("#mi-modal").modal('hide');
            });

            // No
            $("#modal-btn-no").on("click", function() {
                $("#mi-modal").modal('hide');
            });

        });
    </script>
</body>

</html>
