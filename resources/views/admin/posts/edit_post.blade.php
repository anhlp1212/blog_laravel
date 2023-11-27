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
                        <div class="Styles__InfoPage">
                            <div class="info-row">
                                <div class="info-left-addsp">
                                    <div class="Style__AccountInfo">
                                        @if (Route::has('post.edit_post'))
                                            <form class="form-edit-sp" id="form-edit-sp" method="post"
                                                action="{{ route('post.edit_post') }}" enctype="multipart/form-data">
                                                @csrf

                                                <div class="my-form-control">
                                                    <label class="input-label">Post</label>
                                                    <div>
                                                        <div class="Style__StyleInput">
                                                            <input type="hidden" name="id"
                                                                value="{{ $post->id }}">
                                                            <input class="input_fullName" id="tensp" type="text"
                                                                name="title" maxlength="128" placeholder="Add Title Post"
                                                                value=" {{ $post->title }}">
                                                            <div>
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
                                                            <textarea id="myeditorinstance" placeholder="Not Empty!" name="description"> {{ $post->description }}</textarea>
                                                            <div>
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
                                                    <label class="input-label">Image</label>
                                                    <div>
                                                        <img src="{{ asset($post->image) }}" alt="Post Image"
                                                            class="box_image_post" id="box_image_post" />
                                                        <input class="input_fullName" type="file" id="image_post"
                                                            name="image" accept="image/png, image/jpeg"
                                                            value="{{ asset($post->image) }}" />
                                                        <div>
                                                            <small class="small">
                                                                @error('image')
                                                                    <div class="error">
                                                                        {{ $message ?? 'Error' }}</div>
                                                                @enderror
                                                            </small>
                                                        </div>
                                                    </div>
                                                </div>

                                                <br />
                                                <div class="my-form-control">
                                                    <label class="input-label">&nbsp;</label>
                                                    <button type="submit"
                                                        class="Style__StyleBtnSubmit btn-submit">Save</button>
                                                </div>
                                            </form>
                                        @endif
                                    </div>
                                </div>
                                <div class="info-vertical"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script src="{{ mix('/js/post_add_edit.js') }}"></script>
@endsection
