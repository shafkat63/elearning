@extends('layout.stu_public')
@section('title', 'Home ')

@section('content')
<div class="banner-wrapper">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <nav class="navbar navbar-expand-lg">
            <h1><a style="text-decoration: none" href="{{url('/Dashboard')}}"><i class="mdi mdi-book-open-page-variant text-success"></i> <b class="text-success">eLearning App</b></a></h1>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
              <span class="mdi mdi-menu"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
              <ul class="navbar-nav">
                <li class="nav-item active">
                  <a class="nav-link" href="#">HOME</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="#">PRICING</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="#">Subjects</a>
                </li>
              </ul>
            </div>
          </nav>
        </div>
      </div>
      <div class="row py-sm-5 py-0">
        <div class="col-lg-7 banner-content">
          <h3 class="font-weight-light text-white pt-2">eLearning App</h3>
          <h4 class="text-white"> Here you will see the Dhaka University subject list of A Unit, B Unit, C Unit, D Unit, and E Unit. Students who have passed SSC and HSC from the Departments of Science, Business, and Humanities will be able to apply in the subjects of which unit, is nicely mentioned here. So let’s take a look at it without any hassle</h4>
          <div class="my-5">
            <a href="{{url('register')}}" class="btn btn-primary btn-lg me-2 mb-3">Registration</a>
            <a href="{{url('login')}}" class="btn btn-danger btn-lg ms-2 mb-3">Login</a>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="details-wrapper">
    <div class="container">
      <div class="row">
        <div class="col-md-8 mx-auto text-center">
          <h1>Choose Your Subscription today</h1>
          <p class="w-75 mx-auto mb-5">Choose a plan that suits you the best. If you are not fully satisfied, we offer 30-day money-back guarantee no questions asked!!</p>
        </div>
      </div>
      <div class="row">
        <div class="col-12">
            <div class="row pricing-table">
              <div class="col-md-3 grid-margin stretch-card pricing-card">
                <div class="card border-success border pricing-card-body">
                  <div class="text-center pricing-card-head">
                    <h3 class="text-success">Free</h3>
                    <h1 class="font-weight-normal mb-4">00৳</h1>
                  </div>
                  <ul class="list-unstyled plan-features">
                    <li>Limited Exam</li>
                    <li>Progress Check</li>
                    <li>2000+ Unique Questions</li>
                    <li>Free support for one years</li>
                    <li>Free upgrade for one year</li>
                  </ul>
                  <div class="wrapper d-grid gap-2">
                    <a href="#" class="btn btn-outline-success btn-block">Start Now</a>
                  </div>
                </div>
              </div>
              <div class="col-md-3 grid-margin stretch-card pricing-card">
                <div class="card border border-info pricing-card-body">
                  <div class="text-center pricing-card-head">
                    <h3 class="text-info">Silver</h3>
                    <h1 class="font-weight-normal mb-4">50৳</h1>
                  </div>
                  <ul class="list-unstyled plan-features">
                    <li>20+ Exam</li>
                    <li>Progress Check</li>
                    <li>5000+ Unique Questions</li>
                    <li>Free support for one years</li>
                    <li>Free upgrade for one year</li>
                  </ul>
                  <div class="wrapper d-grid gap-2">
                    <a href="#" class="btn btn-outline-info btn-block">Purchase Now</a>
                  </div>
                </div>
              </div>
              <div class="col-md-3 grid-margin stretch-card pricing-card">
                <div class="card border border-primary pricing-card-body">
                  <div class="text-center pricing-card-head">
                    <h3 class="text-primary"> Platinum</h3>
                    <h1 class="font-weight-normal mb-4">80৳</h1>
                  </div>
                  <ul class="list-unstyled plan-features">
                    <li>50+ Exam</li>
                    <li>Progress Check</li>
                    <li>10,0000+ Unique Questions</li>
                    <li>Free support for one years</li>
                    <li>Free upgrade for one year</li>
                  </ul>
                  <div class="wrapper d-grid gap-2">
                    <a href="#" class="btn btn-outline-primary btn-block">Purchase Now</a>
                  </div>
                </div>
              </div>
              <div class="col-md-3 grid-margin stretch-card pricing-card">
                <div class="card border border-warning pricing-card-body">
                  <div class="text-center pricing-card-head">
                    <h3 class="text-warning"> Gold</h3>
                    <h1 class="font-weight-normal mb-4">100৳</h1>
                  </div>
                  <ul class="list-unstyled plan-features">
                    <li>Unlimited Exam</li>
                    <li>Progress Check</li>
                    <li>20,0000+ Unique Questions</li>
                    <li>Free support for one years</li>
                    <li>Free upgrade for one year</li>
                  </ul>
                  <div class="wrapper d-grid gap-2">
                    <a href="#" class="btn btn-outline-warning btn-block">Purchase Now</a>
                  </div>
                </div>
              </div>
            </div>
        </div>
      </div>
      
      <div class="row pt-5">
        <div class="col-md-12 pb-5 text-center">
          <h1>Features Subjects</h1>
        </div>
        <div class="feature-list pt-5">
          <div class="row feature-list-row text-center border-bottom">
            <div class="col-lg-3 feature-list-item border-right">
              <i class="mdi mdi-briefcase"></i>
              <h3>Faculty of Sciences</h3>
            </div>
            <div class="col-lg-3 feature-list-item border-right">
              <i class="mdi mdi-target"></i>
              <h3>Faculty of Biological Sciences</h3>
            </div>
            <div class="col-lg-3 feature-list-item border-right">
              <i class="mdi mdi-cellphone"></i>
              <h3>Pharmacy Faculty</h3>
            </div>
            <div class="col-lg-3 feature-list-item">
              <i class="mdi mdi-emoticon-happy-outline"></i>
              <h3>Statistics Institute</h3>
            </div>
          </div>
          <div class="row feature-list-row text-center">
            <div class="col-lg-3 feature-list-item border-right">
              <i class="mdi mdi-select-compare"></i>
              <h3>Information Technology Institute</h3>
            </div>
            <div class="col-lg-3 feature-list-item border-right">
              <i class="mdi mdi-monitor"></i>
              <h3>Earth and Environment Science Faculty</h3>
            </div>
            <div class="col-lg-3 feature-list-item border-right">
              <i class="mdi mdi-format-color-fill"></i>
              <h3>Education and Research Institute</h3>
            </div>
            <div class="col-lg-3 feature-list-item">
              <i class="mdi mdi-receipt"></i>
              <h3>Lather Engineering and Technology Institute</h3>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- page-body-wrapper ends -->
@endsection

@section('script')

@endsection