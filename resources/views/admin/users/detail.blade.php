@extends('admin.layouts.layout_admin')

@section('script-vue')
    <script src="{{ mix('user/js/main.js') }}"></script>
@endsection

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
        <info-user 
            user-id={{ $user->id }}
            user-name={{ $user->name }} 
            user-email={{ $user->email }}
            url-edit={{ route('user.edit_user_page',$user->id) }}
            url-back={{ route('user.users') }}
        >
        </info-user>
    </div>

    <confirm-popup 
        user-id={{ $user->id }} 
        url-users={{ route('user.users') }}
    >
    </confirm-popup>

    <toast-popup></toast-popup>
@endsection
