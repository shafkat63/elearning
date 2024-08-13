@extends('layout.stu_public')

@section('content')
@section('nav')
@include('layout.st_nav')
@endsection

<style>
    .avatar-small {
        width: 80px;
        height: 80px;
        object-fit: cover;
    }

    .validation-invalid-label {
        font-size: 0.9rem;
        color: #dc3545;
        /* Bootstrap 4 danger color */
    }

    .card .btn-primary.position-absolute {
        padding: 0.5rem;
        border-radius: 50%;
    }

    .btn-primary i {
        font-size: 1.2rem;
        vertical-align: middle;
    }
</style>

<div class="content-wrapper">
    <div class="page-header">
        <h3 class="page-title">Profile</h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">User</a></li>
                <li class="breadcrumb-item active" aria-current="page">Profile</li>
            </ol>
        </nav>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="row justify-content-center">
                        <div class="col-lg-8">
                            <div class="border-bottom text-center pb-4">
                                <div class="position-relative d-inline-block mb-3">
                                    <img src="{{ auth()->user()->avatar ? asset('storage/' . auth()->user()->avatar) : asset('assets/images/faces/face12.jpg') }}"
                                        alt="{{ auth()->user()->name }}"
                                        class="rounded-circle img-fluid avatar-small" />
                                    <!-- Edit button with icon -->
                                    <button class="btn btn-primary position-absolute"
                                        style="bottom: 0; right: 0; transform: translate(50%, 50%);">
                                        <i class="mdi mdi-pencil"></i>
                                    </button>
                                </div>
                                <h3>{{ auth()->user()->name }}</h3>
                            </div>

                            <div class="py-4">
                                <form class="cmxform" id="dataFrom" method="post" action="">
                                    @csrf
                                    <fieldset>
                                        <div class="form-group">
                                            <label for="email">User Name</label>
                                            <input id="email" class="form-control" name="email"
                                                value="{{ auth()->user()->email }}" type="text" readonly>
                                            <div id="error-email" class="validation-invalid-label text-danger mt-1">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="OldPassword">Old Password</label>
                                            <input id="OldPassword" class="form-control" name="OldPassword"
                                                type="password">
                                            <div id="error-OldPassword"
                                                class="validation-invalid-label text-danger mt-1"></div>
                                        </div>
                                        <div class="form-group">
                                            <label for="NewPassword">New Password</label>
                                            <input id="NewPassword" class="form-control" name="NewPassword"
                                                type="password">
                                            <div id="error-NewPassword"
                                                class="validation-invalid-label text-danger mt-1"></div>
                                        </div>
                                        <div class="form-group">
                                            <label for="ConfirmPassword">Confirm Password</label>
                                            <input id="ConfirmPassword" class="form-control" name="ConfirmPassword"
                                                type="password">
                                            <div id="error-ConfirmPassword"
                                                class="validation-invalid-label text-danger mt-1"></div>
                                        </div>
                                        <div class="form-group">
                                            <div id="error-save" class="validation-invalid-label text-danger"></div>
                                        </div>
                                        <button class="btn btn-primary" id="btnSubmit" onclick="SaveData()"
                                            type="button">Submit</button>
                                    </fieldset>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@section('script')
<script src="{{ asset('assets/js/sweetalert.min.js') }}"></script>
<script>
    function SaveData() {
        varUrl = "{{ url('reChangePasswordSt') }}";
        varData = $("#dataFrom").serialize();
        $.ajax({
            type: "POST",
            url:  varUrl,
            data: varData,
            success: function (response) {
                $('.validation-invalid-label').html('');
                if (response.code == '200') {
                    swal({
                        title: response.status,
                        text: response.msg,
                        icon: "success",
                    }).then((value) => {
                        if (value) {
                            window.location.href = response.routeUrl;
                        }
                    });
                } else if (response.code == '201') {
                    swal({
                        title: response.status,
                        text: response.msg,
                        icon: "warning",
                    });
                } else if (response.status == 'error') {
                    $.each(response.data, function (field, messages) {
                        $('#error-' + field).html(messages.join('<br>'));
                    });
                } else {
                    $("#error-save").html("An unexpected error occurred. Please try again.");
                }
            },
            error: function () {
                $('.validation-invalid-label').html('');
                $("#error-save").html("An unexpected error occurred. Please try again.");
            }
        });
    }
</script>
@endsection