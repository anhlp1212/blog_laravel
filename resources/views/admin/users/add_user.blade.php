<!DOCTYPE html>
<html lang="en">

<head>
    @include('admin.layouts.header_post')
</head>

<body class="g-sidenav-show  bg-gray-200">
    <div id="toast"></div>

    @include('admin.layouts.aside')
    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
        <!-- Navbar -->
        @include('admin.layouts.nav_bar')
        <!-- End Navbar -->
        <div class="container-fluid py-4">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                        </div>
                        <div class="card-body px-0 pb-2">
                            <div class="table-responsive p-0" id="box-detail-edit">
                            </div>
                            <div class="Styles__InfoPage">
                                <div class="info-row">
                                    <div class="info-left-addsp">
                                        <div class="Style__AccountInfo">
                                            @if (Route::has('user.add_user'))
                                                <form class="form-add-user" id="form-add-user" method="post"
                                                    action="{{ route('user.add_user') }}" enctype="multipart/form-data">
                                                    @csrf

                                                    <div class="my-form-control">
                                                        <label class="input-label">User Name</label>
                                                        <div>
                                                            <div class="Style__StyleInput">
                                                                <input class="input_fullName" type="text"
                                                                    name="name" maxlength="128"
                                                                    placeholder="Add User Name"
                                                                    value="{{ old('name') }}">
                                                                <div>
                                                                    <small class="small">
                                                                        @error('name')
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
                                                        <label class="input-label">Email</label>
                                                        <div>
                                                            <div class="Style__StyleInput">
                                                                <input class="input_fullName" type="email"
                                                                    name="email" placeholder="Add Email"
                                                                    value="{{ old('email') }}">
                                                                <div>
                                                                    <small class="small">
                                                                        @error('email')
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
                                                        <label class="input-label">Choose a Role</label>
                                                        <div>
                                                            <select class="form-select form-select-lg mb-3" id="roles" name="roles" style="width:30%;">
                                                                <option value="1">Admin</option>
                                                                <option value="2">Editor</option>
                                                            </select>
                                                            <div>
                                                                <small class="small">
                                                                    @error('roles')
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
                                                            class="btn btn-primary">Save</button>
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

            <footer class="footer py-4  ">
                <div class="container-fluid">
                </div>
            </footer>
        </div>
    </main>
    @include('admin.layouts.footer_post')

</body>

</html>
