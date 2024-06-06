@extends('layout.stu_public')


@section('content')
<div class="container-fluid page-body-wrapper full-page-wrapper">
    <div class="content-wrapper d-flex align-items-stretch auth auth-img-bg">
      <div class="row flex-grow">
        <div class="col-lg-6 d-flex align-items-center justify-content-center">
          <div class="auth-form-transparent text-left p-3 UserLogin">
            <div class="brand-logo">
                <a class="navbar-brand brand-logo" href="{{url('/')}}"> <h2 class="text-success">eLearning App</h2></a>
            </div>
            <h4>Login here</h4>
            <form action="#" method="post" enctype="multipart/form-data">@csrf
              <div class="form-group">
                <label>Email</label>
                <div class="input-group">
                  <div class="input-group-prepend bg-transparent">
                    <span class="input-group-text bg-transparent border-right-0">
                      <i class="mdi mdi-email-outline text-primary"></i>
                    </span>
                  </div>
                  <input type="email" id="email" name="email" class="form-control form-control-sm border-left-0" placeholder="Email">
                </div>
              </div>
              <div class="form-group">
                <label>Password</label>
                <div class="input-group">
                  <div class="input-group-prepend bg-transparent">
                    <span class="input-group-text bg-transparent border-right-0">
                      <i class="mdi mdi-lock-outline text-primary"></i>
                    </span>
                  </div>
                  <input type="password" id="password" name="password" class="form-control form-control-sm border-left-0" id="exampleInputPassword" placeholder="Password">
                </div>
              </div>
              <div class="mt-3 d-grid gap-2">
                <button class="btn btn-block btn-gradient-primary btn-lg font-weight-medium auth-form-btn" id="myButton" type="button" onclick="checkLogin()">Sign sin</button>
              </div>
              <div class="text-center mt-4 font-weight-light"> Don't have an account? <a href="{{url('register')}}" class="text-primary">SIGN UP</a>
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
  function checkLogin() {
      var UseId  = $("#email").val();
      var UseUser  = $("#password").val();

      if (UseId!=''){
          if (UseUser!=''){
              loginNow();
          } else{
              swal({
                  text: "Enter Your Password Here !!",
                  icon: "error",
                  timer: '3000'
              });
          }
      } else{
          swal({
              text: "Enter Your Email Here !!",
              icon: "error",
              timer: '3000'
          });
      }

  }

  function loginNow() {
      url = "{{ url('requestLogin') }}";
      $.ajax({
          url: url,
          type: "POST",
          data: new FormData($(".UserLogin form")[0]),
          contentType: false,
          processData: false,
          success: function (data) {
              console.log(data);
              var dataResult = JSON.parse(data);
              if (dataResult.statusCode == 200) {

                  window.location.href = dataResult.route;
                  $('.UserLogin form')[0].reset();
              } else if (dataResult.statusCode == 201) {
                  swal({
                      text: "Login Failed",
                      icon: "error",
                      timer: '1500'
                  });
              }
          }, error: function (data) {
              swal({
                  title: "Oops",
                  text: "Error occured",
                  icon: "error",
                  timer: '1500'
              });
          }
      });
      return false;


  };
</script>
@endsection