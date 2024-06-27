@extends('layout.stu_public')


@section('content')
<div class="container-fluid page-body-wrapper">
    <div class="content-wrapper d-flex align-items-stretch auth auth-img-bg">
      <div class="row flex-grow">
        <div class="col-lg-6 d-flex align-items-center justify-content-center">
          <div class="auth-form-transparent text-left p-3">
            <div class="brand-logo">
                <a class="navbar-brand brand-logo" href="http://127.0.0.1:8000"> <h2 class="text-success">eLearning App</h2></a>
            </div>
            <h4>New here?</h4>
            <h6 class="font-weight-light">Join us today! It takes only few steps</h6>
            <form class="cmxform" id="dataFrom" method="" action="">@csrf
              <div class="form-group">
                <label>Full Name</label>
                <div class="input-group">
                  <div class="input-group-prepend bg-transparent">
                    <span class="input-group-text bg-transparent border-right-0">
                      <i class="mdi mdi-account-outline text-primary"></i>
                    </span>
                  </div>
                  <input type="text" name="name" class="form-control form-control-sm border-left-0" placeholder="Username">
                </div>
                <label id="error-name" for="name" class="validation-invalid-label text-danger mt-1" ></label>
              </div>
              <div class="form-group">
                <label>Email</label>
                <div class="input-group">
                  <div class="input-group-prepend bg-transparent">
                    <span class="input-group-text bg-transparent border-right-0">
                      <i class="mdi mdi-email-outline text-primary"></i>
                    </span>
                  </div>
                  <input type="email" name="email" class="form-control form-control-sm border-left-0" placeholder="Email">
                </div>
                <label id="error-email" for="email" class="validation-invalid-label text-danger mt-1" ></label>
              </div>
              <div class="form-group">
                <label>Phone</label>
                <div class="input-group">
                  <div class="input-group-prepend bg-transparent">
                    <span class="input-group-text bg-transparent border-right-0">
                      <i class="mdi mdi-phone-outline text-primary"></i>
                    </span>
                  </div>
                  <input type="phone" name="phone" class="form-control form-control-sm border-left-0" placeholder="Phone">
                </div>
                <label id="error-phone" for="phone" class="validation-invalid-label text-danger mt-1" ></label>
              </div>
              <div class="form-group">
                <label for="userType">User Type</label>
                <div class="input-group">
                  <div class="input-group-prepend bg-transparent">
                    <span class="input-group-text bg-transparent border-right-0">
                      <i class="mdi mdi-account-multiple text-primary"></i>
                    </span>
                  </div>
                  <select name="userType" class="form-control form-control-sm border-left-0" id="userType">
                    <option value=""  >Select Type</option>
                    <option value="basic">Basic</option>
                    <option value="intermediate">Intermediate</option>
                    <option value="advanced" selected>Advanced</option>
                  </select>
                </div>
                <label id="error-userType" for="userType" class="validation-invalid-label text-danger mt-1"></label>
              </div>

              <div class="form-group">
                <label>Password</label>
                <div class="input-group">
                  <div class="input-group-prepend bg-transparent">
                    <span class="input-group-text bg-transparent border-right-0">
                      <i class="mdi mdi-lock-outline text-primary"></i>
                    </span>
                  </div>
                  <input type="password" name="password" class="form-control form-control-sm border-left-0" id="exampleInputPassword" placeholder="Password">
                </div>
                <label id="error-password" for="password" class="validation-invalid-label text-danger mt-1" ></label>
              </div>
              <div class="form-group">
                <label>Confirm Password</label>
                <div class="input-group">
                  <div class="input-group-prepend bg-transparent">
                    <span class="input-group-text bg-transparent border-right-0">
                      <i class="mdi mdi-lock-outline text-primary"></i>
                    </span>
                  </div>
                  <input type="password" name="ConfirmPassword" class="form-control form-control-sm border-left-0" id="exampleInputPassword" placeholder="Password">
                </div>
                <label id="error-ConfirmPassword" for="ConfirmPassword" class="validation-invalid-label text-danger mt-1" ></label>
              </div>

              <div class="form-group">
                <label id="error-save"  class="validation-invalid-label text-danger" ></label>
              </div>
              {{-- <div class="mb-4">
                <div class="form-check">
                  <label class="form-check-label text-muted">
                    <input type="checkbox" class="form-check-input"> I agree to all Terms & Conditions </label>
                </div>
              </div> --}}
              <div class="mt-3 d-grid gap-2">
                <button class="btn btn-primary" id="btnSubmit" onclick="SaveData()" type="button" value="Submit">SIGN UP</button>
              </div>
              <div class="text-center mt-4 font-weight-light"> Already have an account? <a href="{{url('login')}}" class="text-primary">Login</a>
              </div>
            </form>
          </div>
        </div>
        <div class="col-lg-6 register-half-bg d-flex flex-row">
          <p class="text-dark font-weight-medium text-center flex-grow align-self-end">Copyright &copy; 2021 All rights reserved.</p>
        </div>
      </div>
    </div>
    <!-- content-wrapper ends -->
  </div>
  <!-- page-body-wrapper ends -->
@endsection
@section('script')

<script src="{{ asset('assets/js/sweetalert.min.js') }}"></script>
<script>

    function SaveData() {
      varUrl= "{{url('registerStudent')}}";
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
