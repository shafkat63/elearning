@extends('layout.stu_public')
@section('content')
<!-- partial:partials/_horizontal-navbar.html -->
@section('nav')
@include('layout.st_nav')
@endsection
<!-- partial -->
<div class="main-panel">
  <div class="content-wrapper">
      <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-body">
                <div class="row justify-content-center">
                  <div class="container text-center">
                    <h4 class="mb-3">Start up your Subscription today</h4>
                    <p class="w-75 mx-auto mb-5">Choose a plan that suits you the best. If you are not fully satisfied, we offer 30-day money-back guarantee no questions asked!!</p>
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
                            <form action="{{ url('/pay') }}" method="POST" class="needs-validation">
                              @csrf
                              <input type="hidden" value="{{auth()->user()->name}}" name="customer_name"/>
                              <input type="hidden" value="{{auth()->user()->phone }}" name="mobile"/>
                              <input type="hidden" value="{{auth()->user()->email}}" name="email"/>
                              <input type="hidden" value="NO" name="address"/>
                              <input type="hidden" value="50" name="total_amount"/>
                              <button class="btn btn-outline-info btn-block" type="submit">Purchase Now</button>
                            </form>
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
                            
                            <form action="{{ url('/pay') }}" method="POST" class="needs-validation">
                              @csrf
                              <input type="hidden" value="{{auth()->user()->name}}" name="customer_name"/>
                              <input type="hidden" value="{{auth()->user()->phone }}" name="mobile"/>
                              <input type="hidden" value="{{auth()->user()->email}}" name="email"/>
                              <input type="hidden" value="NO" name="address"/>
                              <input type="hidden" value="80" name="total_amount"/>
                              <button class="btn btn-outline-primary btn-block" type="submit">Purchase Now</button>
                            </form>
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
                            <form action="{{ url('/pay') }}" method="POST" class="needs-validation">
                              @csrf
                              <input type="hidden" value="{{auth()->user()->name}}" name="customer_name"/>
                              <input type="hidden" value="{{auth()->user()->phone }}" name="mobile"/>
                              <input type="hidden" value="{{auth()->user()->email}}" name="email"/>
                              <input type="hidden" value="NO" name="address"/>
                              <input type="hidden" value="100" name="total_amount"/>
                              <button class="btn btn-outline-warning btn-block" type="submit">Purchase Now</button>
                            </form>
                          </div>
                          
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
  </div>
</div>
<!-- main-panel ends -->
</div>
@endsection

@section('script')
<script>
  var obj = {};
  obj.cus_name = $('#customer_name').val();
  obj.cus_phone = $('#mobile').val();
  obj.cus_email = $('#email').val();
  obj.cus_addr1 = $('#address').val();
  obj.amount = $('#total_amount').val();

  $('#sslczPayBtn').prop('postdata', obj);

  (function (window, document) {
      var loader = function () {
          var script = document.createElement("script"), tag = document.getElementsByTagName("script")[0];
          // script.src = "https://seamless-epay.sslcommerz.com/embed.min.js?" + Math.random().toString(36).substring(7); // USE THIS FOR LIVE
          script.src = "https://sandbox.sslcommerz.com/embed.min.js?" + Math.random().toString(36).substring(7); // USE THIS FOR SANDBOX
          tag.parentNode.insertBefore(script, tag);
      };

      window.addEventListener ? window.addEventListener("load", loader, false) : window.attachEvent("onload", loader);
  })(window, document);
</script>
@endsection

