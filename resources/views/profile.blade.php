@extends('layouts.master')

@section('title', 'Profile')

@section('meta')
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="author" content="">
@endsection

@section('vendor-css')
@endsection

@section('style')
    <link rel="stylesheet" href="{{ asset('assets/css/intlTelInput.css') }}">
    <style>
        .iti--separate-dial-code .iti__selected-flag {
            background: none !important;
        }
    </style>
@endsection

@section('content')
<div class="app-content content ">
    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>
    <div class="content-wrapper container-xxl p-0">
        <div class="content-header row">
        </div>
        <div class="content-body">
            <section class="app-user-view-account">
                <div class="row">
                    <!-- User Sidebar -->
                    <div class="col-12 col-md-6 order-1 order-md-0">
                        <!-- User Card -->
                        <div class="card">
                            <div class="card-body">
                                <div class="user-avatar-section">
                                    <div class="d-flex align-items-center flex-column">
                                        <img class="img-fluid rounded mt-3 mb-2" src="{{ $data->image ?? asset('app-assets/images/avatars/profile.png') }}" height="110" width="110" alt="Admin avatar" />
                                        <div class="user-info text-center">
                                            <h4>{{ $data->name ?? '' }}</h4>
                                        </div>
                                    </div>
                                </div>
                                <h4 class="fw-bolder border-bottom pb-50 mb-1">Details</h4>
                                <div class="info-container">
                                    <ul class="list-unstyled">
                                        <li class="mb-75">
                                            <span class="fw-bolder me-25">Email:</span>
                                            <span>{{ $data->email ?? '' }}</span>
                                        </li>
                                    </ul>
                                    <div class="d-flex justify-content-center pt-2">
                                        <a href="javascript:;" class="btn btn-primary me-1 edit-record" data-bs-target="#modal-create" data-bs-toggle="modal">
                                            Change Password
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /User Card -->
                    </div>
                    <!--/ User Sidebar -->
                    <div class="col-12 col-md-6 order-1 order-md-0">
                        <!-- User Card -->
                        <div class="card">
                            <div class="card-body">
                                <div class="modal-body pb-5 px-sm-5 pt-50">
                                    <div class="text-center mb-2">
                                        <h1 class="mb-1">Edit Admin Information</h1>
                                        <p>Updating admin details will receive a privacy audit.</p>
                                    </div>
                                    <form id="add_form" class="row gy-1 pt-75" onsubmit="return false">
                                        @csrf
                                        <div class="col-12">
                                            <label class="form-label" for="name">Name</label>
                                            <input type="text" id="name" name="name" class="form-control" placeholder="Arda Kaan" value="{{ $data->name ?? '' }}" data-msg="Please enter your name" />
                                            <div class="invalid-feedback d-block" id="name_error"></div>
                                        </div>
                                        <div class="col-12">
                                            <label class="form-label" for="email">Email</label>
                                            <input type="email" id="email" name="email" class="form-control" value="{{ $data->email ?? '' }}" placeholder="example@domain.com" />
                                            <div class="invalid-feedback d-block" id="email_error"></div>
                                        </div>
                                        <div class="col-12">
                                            <label class="form-label" for="images">Image</label>
                                            <input type="file" id="image" name="image" class="form-select" accept="image/*"/>
                                            <div class="invalid-feedback d-block" id="image_error"></div>
                                        </div>
                                        <div class="col-12 text-center mt-2 pt-50">
                                            <button type="submit" id="add_button" class="btn btn-primary me-1">Submit</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <!-- /User Card -->
                    </div>
                </div>
            </section>
            <!-- Edit User Modal -->
            <div class="modal fade" id="modal-create" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header bg-transparent">
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body pb-5 px-sm-5 pt-50">
                            <div class="text-center mb-2">
                                <h1 class="mb-1">Change Password</h1>
                                <p>Updating admin password will receive a privacy audit.</p>
                            </div>
                            <form id="password_form" class="row gy-1 pt-75" onsubmit="return false">
                                @method('PATCH')
                                @csrf
                                <div class="col-12">
                                    <label class="form-label" for="current_password">Current Password</label>
                                    <div class="input-group input-group-merge form-password-toggle">
                                        <input type="password" id="current_password" class="form-control form-control-merge" id="current_password" name="current_password" tabindex="2" placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"/>
                                        <span class="input-group-text cursor-pointer"><i data-feather="eye"></i></span>
                                    </div>
                                    <div class="invalid-feedback d-block" id="current_password_error"></div>
                                </div>
                                <div class="col-12">
                                    <label class="form-label" for="password">Password</label>
                                    <div class="input-group input-group-merge form-password-toggle">
                                        <input type="password" id="password" class="form-control form-control-merge" id="password" name="password" tabindex="2" placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"/>
                                        <span class="input-group-text cursor-pointer"><i data-feather="eye"></i></span>
                                    </div>
                                    <div class="invalid-feedback d-block" id="password_error"></div>
                                </div>
                                <div class="col-12">
                                    <label class="form-label" for="password_confirmation">Password Confirmation</label>
                                    <div class="input-group input-group-merge form-password-toggle">
                                        <input type="password" id="password_confirmation" class="form-control form-control-merge" id="password_confirmation" name="password_confirmation" tabindex="2" placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"/>
                                        <span class="input-group-text cursor-pointer"><i data-feather="eye"></i></span>
                                    </div>
                                    <div class="invalid-feedback d-block" id="password_confirmation_error"></div>
                                </div>
                                <div class="col-12 text-center mt-2 pt-50">
                                    <button type="submit" id="password_button" class="btn btn-primary me-1">Submit</button>
                                    <button type="reset" class="btn btn-outline-secondary" data-bs-dismiss="modal" aria-label="Close">
                                        Discard
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!--/ Edit User Modal -->

        </div>
    </div>
</div>
@endsection

@section('vendor-js')
@endsection

@section('script')
    <script>
        $(document).ready(function (){
            $(document).on("click", ".edit-record", function () {
                $('#current_password_error').text('');
                $('#password_error').text('');
                $('#password_confirmation_error').text('');
                $('.hidden').show();
            });

            const addForm = '{{ route('admin.profile.store') }}';
            $('#add_form').submit(function (e) {
                e.preventDefault();
                var form_data = new FormData(this);
                $.ajax({
                    method: "POST",
                    url: addForm,
                    data: form_data,
                    contentType: false,
                    processData: false,
                    dataType: "json",
                    headers: {"X-CSRF-Token": $('meta[name="csrf-token"]').attr('content')},
                    beforeSend: function () {
                        $('#add_button').attr('disabled', 'disabled');
                        $('#name_error').text('');
                        $('#image_error').text('');
                        $('#email_error').text('');
                    },
                    success: function (data) {
                        $("#add_form")[0].reset();
                        $('#modal-create').modal('hide');
                        if (data.success === true) {
                            toastr.success(data.message);
                            window.location.reload();
                        } else {
                            toastr.error(data.message);
                        }
                        $('#add_button').attr('disabled', false);
                    },
                    error: function (data) {
                        $('#add_button').attr('disabled', false);
                        let responseData = data.responseJSON;
                        $('#name_error').text(responseData.errors['name']);
                        $('#image_error').text(responseData.errors['image']);
                        $('#email_error').text(responseData.errors['email']);
                    }
                });
            });

            const passwordForm = '{{ route('admin.profile.update', ['profile' => $data->id]) }}';
            $('#password_form').submit(function (e) {
                e.preventDefault();
                var form_data = new FormData(this);
                $.ajax({
                    method: "POST",
                    url: passwordForm,
                    data: form_data,
                    contentType: false,
                    processData: false,
                    dataType: "json",
                    headers: {"X-CSRF-Token": $('meta[name="csrf-token"]').attr('content')},
                    beforeSend: function () {
                        $('#password_button').attr('disabled', 'disabled');
                        $('#current_password_error').text('');
                        $('#password_error').text('');
                        $('#password_confirmation_error').text('');
                    },
                    success: function (data) {
                        $("#add_form")[0].reset();
                        $('#modal-create').modal('hide');
                        if (data.success === true) {
                            toastr.success(data.message);
                            //window.location.reload();
                        } else {
                            toastr.error(data.message);
                        }
                        $('#password_button').attr('disabled', false);
                    },
                    error: function (data) {
                        $('#password_button').attr('disabled', false);
                        let responseData = data.responseJSON;
                        $('#current_password_error').text(responseData.errors['current_password']);
                        $('#password_error').text(responseData.errors['password']);
                        $('#password_confirmation_error').text(responseData.errors['password_confirmation']);
                    }
                });
            });
        });
    </script>
@endsection
