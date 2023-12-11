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
                        @if (Route::has('user.add_user'))
                            <form-user
                                list-role={{ json_encode($roles) }}
                            ></form-user>
                        @endif
                    </div>
                    <div class="info-vertical"></div>
                </div>
            </div>
        </div>
    </div>
    <toast-popup></toast-popup>
@endsection
