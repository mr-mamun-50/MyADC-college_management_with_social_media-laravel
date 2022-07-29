@extends('admin.layouts.app')
@section('title')
    Change Password
@endsection
<?php $menu = 'Admin_password';
$submenu = 'Change'; ?>

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header bg-light py-3 px-4">
                    <h5>Change Admin Password</h5>
                </div>
                <div class="card-body">

                    <form action=" {{ route('admin.password.update') }} " method="post">
                        @csrf
                        <div class="form-group">
                            <label for="current_password">Current Password</label>
                            <input id="current_password" class="form-control @error('current_password') is-invalid @enderror"
                                type="password" name="current_password">
                            @error('current_password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="password">New Password</label>
                            <input id="password" class="form-control @error('password') is-invalid @enderror"
                                type="password" name="password">
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="password_confirmation">Confirm Password</label>
                            <input id="password_confirmation"
                                class="form-control @error('password_confirmation') is-invalid @enderror" type="password"
                                name="password_confirmation">
                            @error('password_confirmation')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="text-right">
                            <button type="submit" class="btn btn-primary">Change Password</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
