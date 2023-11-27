@extends('admin.layouts.layout_admin')

@section('content')

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
                                        <th class="text-uppercase text-center text-xxs font-weight-bolder opacity-7">
                                            ID</th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Name</th>
                                        <th class="text-uppercase text-xxs font-weight-bolder opacity-7 ps-2">
                                            Email</th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
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
                                                    @if (Route::has('user.detail'))
                                                        <a class="btn btn-success btn-sm"
                                                            href="{{ route('user.detail', $user->id) }}">Show</a>
                                                    @endif
                                                    @if (Route::has('user.edit_user_page'))
                                                        <a class="btn btn-info btn-sm"
                                                            href="{{ route('user.edit_user_page', $user->id) }}">Edit</a>
                                                    @endif
                                                    @if (Route::has('user.delete_user'))
                                                        <a class="btn btn-primary btn-sm delete_btn"
                                                            id="{{ $user->id }}" data-toggle="tooltip"
                                                            href="#">Delete</a>
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
    </div>

    {{-- Popup confirm --}}
    @include('layouts.confirm')

    {{-- Popup toast  --}}
    @include('layouts.toast')
@endsection

@section('script')
    <script src="{{ mix('/js/user_delete.js') }}"></script>
@endsection
