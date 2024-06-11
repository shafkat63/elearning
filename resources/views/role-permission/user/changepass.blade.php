@extends('layout.app')
@section('title', 'Permission Info')
@section('mainNav')
@include('layout.nav')
@endsection

@section('mainContent')
<div class="content-wrapper">
  <div class="page-header">
    <h3 class="page-title"> Profile </h3>
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
                <div class="position-relative d-inline-block">
                    <img src="../../../assets/images/faces/face12.jpg" alt="profile" class="img-lg rounded-circle mb-3" />
                    <!-- Edit button with icon -->
                    <button class="btn position-absolute bottom-0 end-0" style="transform: translate(50%, 50%);">
                        <i class="mdi mdi-pencil"></i>
                    </button>
                </div>
                <h3>{{ auth()->user()->name }}</h3>
            </div>

              <div class="py-4">
                <form class="cmxform" id="dataFrom" method="" action="">
                  @csrf
                  <fieldset>
                    <div class="form-group">
                      <label for="email">User Name</label>
                      <input id="email" class="form-control" name="email" value="{{ auth()->user()->email }}" type="text" readonly>
                      <label id="error-email" for="email" class="validation-invalid-label text-danger mt-1" ></label>
                    </div>
                    <div class="form-group">
                      <label for="OldPassword">Old Password</label>
                      <input id="OldPassword" class="form-control" name="OldPassword" type="password">
                      <label id="error-OldPassword" for="OldPassword" class="validation-invalid-label text-danger mt-1" ></label>
                    </div>
                    <div class="form-group">
                      <label for="NewPassword">New Password</label>
                      <input id="NewPassword" class="form-control" name="NewPassword" type="password">
                      <label id="error-NewPassword" for="NewPassword" class="validation-invalid-label text-danger mt-1" ></label>
                    </div>
                    <div class="form-group">
                      <label for="ConfirmPassword">Confirm Password</label>
                      <input id="ConfirmPassword" class="form-control" name="ConfirmPassword" type="password">
                      <label id="error-ConfirmPassword" for="ConfirmPassword" class="validation-invalid-label text-danger mt-1" ></label>
                    </div>
                    <div class="form-group">
                      <label id="error-save"  class="validation-invalid-label text-danger" ></label>
                    </div>
                    <button class="btn btn-primary" id="btnSubmit" onclick="SaveData()" type="button" value="Submit">Submit</button>
                  </fieldset>
                </form>
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
      varUrl= "{{url('regChangePassword')}}";
      varData= $("#dataFrom").serialize();
      $.ajax({
          type: "POST",
          url:  varUrl,
          data: varData,
          success: function (response) {
              console.log(response);
              $('.validation-invalid-label').html('');
              if (response.code == '200') {
                  swal({
                      title: response.status,
                      text: response.msg,
                  }).then((value) => {
                    if (value) {
                        window.location.href =  response.routeUrl;
                    }
                });
              } else if (response.code == '201') {
                swal({
                      title: response.status,
                      text: response.msg,
                  });
              } else if (response.status == 'error') {
                  $.each(response.data, function (field, messages) {
                      $('#error-' + field).html(messages.join('<br>'));
                  });
              } else{
                  $("#error-save").html("An unexpected error occurs during processing. Please try again.");
              }
          },
          error: function () {
              console.log(varUrl);
              console.log(varData);
              $('.validation-invalid-label').html('');
              $("#error-save").html("An unexpected error occurs during processing. Please try again.1");
          }
      });
    }
</script>
@endsection
