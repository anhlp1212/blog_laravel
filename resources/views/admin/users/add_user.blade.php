@extends('admin.layouts.layout_admin')

@section('assets')
    <link href="{{ mix('/css/user/style.css') }}" rel="stylesheet" />
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
                                        @if (session('warning'))
                                            <div class="alert alert-warning"> {{ session('warning') }} </div>
                                        @endif
                                        @if (Route::has('user.add_user'))
                                            <form class="form-add-user" id="form-add-user" method="post"
                                                action="{{ route('user.add_user') }}">
                                                @csrf

                                                <div class="my-form-control">
                                                    <label class="input-label">User Name</label>
                                                    <div>
                                                        <div class="Style__StyleInput">
                                                            <input class="input_fullName" type="text" name="name"
                                                                maxlength="128" placeholder="Add User Name"
                                                                value="{{ old('name') }}">
                                                            <div class="box-error-message">
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
                                                            <input class="input_fullName" type="email" name="email"
                                                                placeholder="Add Email" value="{{ old('email') }}">
                                                            <div class="box-error-message">
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
                                                        @if (isset($roles))
                                                            <select class="form-select form-select-lg" id="roles"
                                                                name="roles" style="width:30%;">
                                                                @foreach ($roles as $role)
                                                                    <option value="{{ $role->id }}">
                                                                        {{ $role->name }}
                                                                    </option>
                                                                @endforeach
                                                            </select>
                                                            <div class="box-error-message">
                                                                <small class="small">
                                                                    @error('roles')
                                                                        <div class="error">
                                                                            {{ $message ?? 'Error' }}</div>
                                                                    @enderror
                                                                </small>
                                                            </div>
                                                        @endif
                                                    </div>
                                                </div>

                                                <div class="my-form-control">
                                                    <label class="input-label">Password</label>
                                                    <div>
                                                        <div class="Style__StyleInput">
                                                            <input class="input_fullName" type="password" name="password"
                                                                placeholder="Enter Password">
                                                            <div class="box-error-message">
                                                                <small class="small">
                                                                    @error('password')
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
                                                    <label class="input-label">Confirm Password</label>
                                                    <div>
                                                        <div class="Style__StyleInput">
                                                            <input class="input_fullName" type="password"
                                                                name="password_confirmation"
                                                                placeholder="Enter Password to Confirm">
                                                        </div>
                                                    </div>
                                                </div>

                                                <br />
                                                <div class="my-form-control">
                                                    <label class="input-label">&nbsp;</label>
                                                    <button type="submit" class="btn btn-primary">Save</button>
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
