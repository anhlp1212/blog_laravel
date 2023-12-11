@extends('admin.layouts.layout_admin')

@section('script-vue')
    <script src="{{ mix('user/js/main.js') }}"></script>
@endsection

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
                            <table-users 
                                check-url-show="{{ Route::has('user.detail') }}"
                                check-url-show="{{ Route::has('user.detail') }}"
                                check-url-edit="{{ Route::has('user.edit_user_page') }}"
                                check-url-delete="{{ Route::has('user.delete_user') }}"
                                data-users="{{ json_encode($users) }}"
                            ></table-users>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <toast-popup></toast-popup>
@endsection
