@extends('admin.layouts.layout_admin')

@section('content')
    <div class="card card-body mx-3 mx-md-4">
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
                                <li class="list-group-item border-0 ps-0 pt-0 text-sm"><strong class="text-dark">Full
                                        Name:</strong> &nbsp; {{ $user->name }}</li>
                                <li class="list-group-item border-0 ps-0 text-sm"><strong class="text-dark">Email:</strong>
                                    &nbsp; {{ $user->email }}</li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-12 mt-4 d-grid gap-2 d-md-flex" style="justify-content: space-between;">
                    <div>
                        @if (Route::has('user.edit_user_page'))
                            <a class="btn btn-info btn-sm" href="{{ route('user.edit_user_page', $user->id) }}">Edit</a>
                        @endif
                        <a class="btn btn-primary btn-sm" href="#">Delete</a>
                    </div>
                    <div class="justify-content-md-end">
                        @if (Route::has('user.users'))
                            <a class="btn btn-secondary btn-sm me-md-2" href="{{ route('user.users') }}">Back</a>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
