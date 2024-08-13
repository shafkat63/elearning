@extends('layout.stu_public')
@section('title', 'User Info')

@section('content')
    @section('nav') 
        @include('layout.st_nav') 
    @endsection

<div class="content-wrapper">
  <div class="row justify-content-center">
    <div class="col-lg-9 col-md-10 col-sm-12">
      <div class="card shadow-lg"> <!-- Added shadow-lg class for more shadow -->
        <div class="card-body">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h4 class="card-title">Add User</h4>
                <a href="{{ url('Home') }}" class="btn btn-gradient-success btn-md btn-icon-text">
                    <i class="mdi mdi-arrow-left btn-icon-prepend"></i> Back
                </a>
            </div>

            <form class="cmxform" id="dataFrom" method="post" action="">
              @csrf
              <fieldset>
                <div class="form-group">
                  <label for="name">Name</label>
                  <input type="hidden" name="id" value="{{ $user->id }}">
                  <input id="name" class="form-control" name="name" type="text" value="{{ $user->name }}">
                  <label id="error-name" for="name" class="validation-invalid-label text-danger mt-1"></label>
                </div>
                <div class="form-group">
                  <label for="email">Email</label>
                  <input id="email" class="form-control" name="email" type="text" value="{{ $user->email }}" disabled>
                  <label id="error-email" for="email" class="validation-invalid-label text-danger mt-1"></label>
                </div>
                <div class="form-group">
                  <label for="phone">Phone</label>
                  <input id="phone" class="form-control" name="phone" type="text" value="{{ $user->phone }}">
                  <label id="error-phone" for="phone" class="validation-invalid-label text-danger mt-1"></label>
                </div>
                <div class="form-group">
                  <label for="password">Password</label>
                  <input id="password" class="form-control" name="password" type="password">
                  <label id="error-password" for="password" class="validation-invalid-label text-danger mt-1"></label>
                </div>
                <div class="form-group">
                  <label id="error-save" class="validation-invalid-label text-danger"></label>
                </div>
                <button class="btn btn-primary" id="btnSubmit" type="button">Submit</button>
              </fieldset>
            </form>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection

@section('script')
<script src="{{ asset('assets/js/sweetalert.min.js') }}"></script>
<script src="{{ asset('assets/js/custom.js') }}"></script>
<script>
    $("#btnSubmit").on("click", function () {
        SaveData("{{ url('updateProfileSt') }}", $("#dataFrom").serialize());
    });
</script>
@endsection
