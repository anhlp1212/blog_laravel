@extends('admin.layouts.layout_admin')

@section('content')
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-12">
                <div class="card my-4">
                    <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                        <div class="shadow-primary border-radius-lg flex justify-content-between pt-4 pb-3" >
                            <form method="GET">
                                <div class="input-group mb-3 ms-3">
                                    <input type="text" name="search" value="{{ request()->get('search') }}"
                                        class="form-control border px-3" planowrapceholder="Search..." aria-label="Search"
                                        aria-describedby="button-addon2">
                                    <button class="btn btn-success my-0" type="submit" id="button-addon2">Search</button>
                                </div>
                            </form>
                            @if (Route::has('post.add_post_page'))
                                <a href="{{ route('post.add_post_page') }}">
                                    <button type="button" id="btn_add_sp" class="btn btn-outline-primary btn mb-0"
                                        style="margin-right: 15px;">Add</button>
                                </a>
                            @endif
                        </div>
                    </div>
                    <div class="card-body px-1 pb-2">
                        <div class="table-responsive p-0">
                            <table class="table align-items-center mb-0">
                                <thead>
                                    <tr>
                                        <th class="text-uppercase text-center text-xs font-weight-bolder opacity-7">
                                            ID</th>
                                        <th
                                            class="text-uppercase text-center text-secondary text-xs font-weight-bolder opacity-7">
                                            User_Created</th>
                                        <th class="text-uppercase text-center text-xs font-weight-bolder opacity-7 ps-2">
                                            Title</th>
                                        <th
                                            class="text-center text-uppercase text-secondary text-xs font-weight-bolder opacity-7">
                                            Image</th>
                                        <th class="text-secondary opacity-7"></th>
                                    </tr>
                                </thead>
                                <tbody class="table-tbody-sp">
                                    @include('admin.posts.table_posts_data')
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="text-uppercase flex-1 py-5 font-sans">
            {!! $posts->links() !!}
        </div>
    </div>

    {{-- Popup confirm --}}
    @include('layouts.confirm')

    {{-- Popup toast  --}}
    @include('layouts.toast')
@endsection

@section('script')
    <script type="module" src="{{ mix('/js/post_delete.js') }}"></script>
@endsection
