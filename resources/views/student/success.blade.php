@extends('layout.stu_public')
@section('content')
<!-- partial:partials/_horizontal-navbar.html -->

<div class="container-scroller">
  <div class="container-fluid page-body-wrapper full-page-wrapper">
    <div class="content-wrapper d-flex align-items-center text-center error-page bg-success">
      <div class="row flex-grow">
        <div class="col-lg-12 mx-auto text-white">
          <div class="row align-items-center d-flex flex-row">
            
            <div class="col-lg-12">
              <h1>Success!</h1>
              <h2 class="font-weight-light">Transaction is successfully Completed.</h2>
            </div>
            <div class="row mt-5">
              <div class="col-12 text-center mt-xl-2">
                <a class="text-white font-weight-medium" href="{{url('login')}}">Back to Login</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- content-wrapper ends -->
  </div>
  <!-- page-body-wrapper ends -->
</div>

@endsection

@section('script')

@endsection

