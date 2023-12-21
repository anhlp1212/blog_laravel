@extends('admin.layouts.layout_admin')

@section('script-vue')
    <script src="{{ mix('user/js/main.js') }}"></script>
@endsection

@section('content')
    <info-user 
        data-user={{ json_encode($user) }}
        url-edit={{ route('user.edit_user_page',$user->id) }}
    ></info-user>

    <confirm-popup 
        user-id={{ $user->id }} 
        url-users={{ route('user.users') }}
    ></confirm-popup>

    <toast-popup></toast-popup>
@endsection
