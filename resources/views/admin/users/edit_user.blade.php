@extends('admin.layouts.layout_admin')

@section('assets')
    <link href="{{ mix('/css/user/style.css') }}" rel="stylesheet" />
@endsection

@section('script-vue')
    <script src="{{ mix('user/js/main.js') }}"></script>
@endsection

@section('content')
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body px-0 pb-2">
                        @if (session('warning'))
                            <div class="alert alert-warning"> {{ session('warning') }} </div>
                        @endif
                        @if (Route::has('user.edit_user'))
                            <form-user 
                                list-role={{ json_encode($roles) }}
                                data-user={{ json_encode($user) }}
                                url-action="/admin/users/edit_user"
                            ></form-user>
                        @endif
                    </div>
                </div>
                <div class="info-vertical"></div>
            </div>
        </div>
    </div>
@endsection
