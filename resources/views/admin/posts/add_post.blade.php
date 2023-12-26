@extends('admin.layouts.layout_admin')

@section('assets')
    <link href="{{ mix('/css/post/style.css') }}" rel="stylesheet" />
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
                        @if (Route::has('post.add_post'))
                            <form class="form-add-sp" id="form-add-sp" method="post" action="{{ route('post.add_post') }}"
                                enctype="multipart/form-data">
                                @csrf

                                <div class="my-form-control">
                                    <label class="input-label">Post</label>
                                    <div>
                                        <div class="Style__StyleInput">
                                            <input class="input_fullName" id="tensp" type="text" name="title"
                                                maxlength="128" placeholder="Add Title Post" value="{{ old('title') }}">
                                            <div class="mt-2">
                                                <small class="small">
                                                    @error('title')
                                                        <div class="error">
                                                            {{ $message ?? 'Error' }}
                                                        </div>
                                                    @enderror
                                                </small>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="my-form-control">
                                    <label class="input-label">Description</label>
                                    <div>
                                        <div class="Style__StyleInput">
                                            <!-- Insert the blade containing the TinyMCE placeholder HTML element -->
                                            <textarea id="myeditorinstance" placeholder="Not Empty!" name="description">{{ old('description') }}</textarea>
                                            <div class="mt-2">
                                                <small class="small">
                                                    @error('description')
                                                        <div class="error">
                                                            {{ $message ?? 'Error' }}
                                                        </div>
                                                    @enderror
                                                </small>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="my-form-control">
                                    <img src="" alt="box_image_post" style="display: none;"
                                        class="img-fluid box_image_post" id="box_image_post">
                                    <input class="mt-2" type="file" id="image_post" name="image"
                                        accept="image/png, image/jpeg, image/jpg" />
                                    <div class="mt-2">
                                        <small class="small">
                                            @error('image')
                                                <div class="error">
                                                    {{ $message ?? 'Error' }}</div>
                                            @enderror
                                        </small>
                                    </div>
                                </div>

                                <br />
                                <div class="my-form-control">
                                    <button type="submit" class="btn btn-submit bg-gradient-primary">Save</button>
                                </div>
                            </form>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script src="{{ mix('/js/post_add_edit.js') }}"></script>
@endsection
