<!DOCTYPE html>
<html lang="en">

<head>
    @include('admin.layouts.header_post')
    <script src="{{ mix('js/app.js') }}"></script>

</head>

<body class="g-sidenav-show bg-gray-200">
    @include('admin.layouts.aside')

    <div class="main-content position-relative max-height-vh-100 h-100">
        <!-- Navbar -->
        @include('admin.layouts.nav_bar')
        <!-- End Navbar -->
        <div class="container-fluid px-2 px-md-4">
            <div class="page-header min-height-300 border-radius-xl mt-4"
                style="background-image: url('https://images.unsplash.com/photo-1531512073830-ba890ca4eba2?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=1920&q=80');">
                <span class="mask  bg-gradient-primary  opacity-6"></span>
            </div>
            <div class="card card-body mx-3 mx-md-4 mt-n6">
                <div class="row gx-4 mb-2">
                    <div class="col-auto my-auto">
                        <div class="h-100">
                            <h5 class="mb-1">
                                {{ $user->name }}
                            </h5>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="row">
                        <div class="col-12 col-xl-4">
                            <div class="card card-plain h-100">
                                <div class="card-header pb-0 p-3">
                                    <div class="row">
                                        <div class="col-md-8 d-flex align-items-center">
                                            <h6 class="mb-0">Profile Information</h6>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body p-3">
                                    <hr class="horizontal gray-light my-4">
                                    <ul class="list-group">
                                        <li class="list-group-item border-0 ps-0 pt-0 text-sm"><strong
                                                class="text-dark">Full Name:</strong> &nbsp; {{ $user->name }}</li>
                                        <li class="list-group-item border-0 ps-0 text-sm"><strong
                                                class="text-dark">Email:</strong> &nbsp; {{ $user->email }}</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 mt-4">
                            <a class="btn btn-info btn-sm" href="{{ route('user.detail', $user->id) }}">Edit</a>
                            <a class="btn btn-primary btn-sm" href="#">Delete</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>

</html>
