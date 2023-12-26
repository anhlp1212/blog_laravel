<!DOCTYPE html>
<html lang="en">

<head>
    @include('admin.layouts.header_post')
</head>

<body class="bg-gray-200">
    <main class="main-content  mt-0">
        <div class="page-header align-items-start min-vh-100"
            style="background-image: url('https://images.unsplash.com/photo-1497294815431-9365093b7331?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1950&q=80');">
            <span class="mask bg-gradient-dark opacity-6"></span>
            <div class="container my-auto">
                <div class="row">
                    <div class="col-lg-4 col-md-8 col-12 mx-auto">
                        <div class="card z-index-0 fadeIn3 fadeInBottom">
                            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                                <div class="bg-gradient-primary shadow-primary border-radius-lg py-3 pe-1">
                                    <h4 class="text-white font-weight-bolder text-center mt-2 mb-0">Sign in</h4>
                                    <div class="row mt-3">
                                        <div class="col-2 text-center ms-auto">
                                            <a class="btn btn-link px-3" href="javascript:;">
                                                <i class="fa fa-facebook text-white text-lg"></i>
                                            </a>
                                        </div>
                                        <div class="col-2 text-center px-1">
                                            <a class="btn btn-link px-3" href="javascript:;">
                                                <i class="fa fa-github text-white text-lg"></i>
                                            </a>
                                        </div>
                                        <div class="col-2 text-center me-auto">
                                            <a class="btn btn-link px-3" href="javascript:;">
                                                <i class="fa fa-google text-white text-lg"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                @if (Route::has('admin.login'))
                                    <form class="text-start" action="{{ route('admin.login') }}" method="post">
                                        @csrf

                                        <label class="form-label mt-3 mb-1 text-dark">Email</label>
                                        <div class="input-group input-group-outline mb-1">
                                            <input type="email" class="form-control" placeholder="name@example.com"
                                                id="email" name="email" value="{{ old('email') }}">
                                        </div>
                                        @error('email')
                                            <div class="text-danger">{{ $message ?? 'Error' }}</div>
                                        @enderror

                                        <label class="form-label mt-3 mb-1 text-dark">Password</label>
                                        <div class="input-group input-group-outline mb-1">
                                            <input type="password" class="form-control" placeholder="Enter the password"
                                                id="password" name="password">
                                        </div>
                                        @error('password')
                                            <div class="text-danger">{{ $message ?? 'Error' }}</div>
                                        @enderror

                                        <div class="form-check form-switch d-flex align-items-center my-3">
                                            <input class="form-check-input" type="checkbox" id="rememberMe" checked>
                                            <label class="form-check-label mb-0 ms-3" for="rememberMe">Remember
                                                me</label>
                                        </div>
                                        <div class="text-center">
                                            <button type="submit" class="btn bg-gradient-primary w-100 my-3 mb-2">Sign
                                                in</button>
                                        </div>
                                        <p class="mt-4 text-sm text-center">
                                            Don't have an account?
                                            <a href="#" class="text-primary text-gradient font-weight-bold">Sign
                                                up</a>
                                        </p>
                                    </form>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
</body>

</html>
