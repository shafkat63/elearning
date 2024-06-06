@extends('layout.stu_public')
@section('content')
<!-- partial:partials/_horizontal-navbar.html -->
@section('nav')
@include('layout.st_nav')
@endsection
<!-- partial -->
<style>
  /* Custom CSS for gradient */
  .gradient-card {
    background: linear-gradient(to bottom right, #f0ecc6, #90cff3);
    color: white;
  }
</style>
<div class="main-panel">
  <div class="content-wrapper">
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
                    <div class="border-bottom py-4">
                      <p>Subscription</p>
                      <div>
                        @if(auth()->check())
                            @foreach(auth()->user()->roles as $role)
                              <label class="badge badge-outline-dark gradient-card text-black my-1">{{ $role->name }}</label>
                            @endforeach
                        @endif
                      </div>
                    </div>
                    {{-- <div class="border-bottom py-4">
                      <div class="d-flex mb-3">
                        <div class="progress progress-md flex-grow">
                          <div class="progress-bar bg-gradient-primary" role="progressbar" aria-valuenow="55" style="width: 55%" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                      </div>
                      <div class="d-flex">
                        <div class="progress progress-md flex-grow">
                          <div class="progress-bar bg-gradient-success" role="progressbar" aria-valuenow="75" style="width: 75%" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                      </div>
                    </div> --}}
                    <div class="py-4 card bg-light text-dark card gradient-card ">
                      <div class="card-body">

                      <p class="clearfix">
                        <span class="float-start"> Status </span>
                        <span class="float-end  text-success"> Active </span>
                      </p>
                      <p class="clearfix">
                        <span class="float-start"> Phone </span>
                        <span class="float-end "> {{ auth()->user()->phone }} </span>
                      </p>
                      <p class="clearfix">
                        <span class="float-start"> Mail </span>
                        <span class="float-end text-muted"> {{ auth()->user()->email }} </span>
                      </p>
                      <p class="clearfix">
                        <span class="float-start"> Login ID </span>
                        <span class="float-end text-muted">
                          <a href="#">{{ auth()->user()->email }}</a>
                        </span>
                      </p>
                    </div>
                    {{-- <div class="d-grid gap-2">
                      <button class="btn btn-gradient-primary btn-block">Preview</button>
                    </div> --}}
                  </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
  </div>
</div>
  <!-- content-wrapper ends -->
  <!-- partial:../../partials/_footer.html -->

  <!-- partial -->
</div>
<!-- main-panel ends -->
</div>
@endsection

@section('script')
@endsection