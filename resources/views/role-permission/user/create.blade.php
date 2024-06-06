@extends('layout.app')
@section('title', 'User Info')
@section('mainNav')
@include('layout.nav')
@endsection

@section('mainContent')
<div class="content-wrapper">
  <div class="row">
    <div class="col-lg-12">
      <div class="card">
        <div class="card-body">
            <h4 class="card-title">
                <div class="row">
                    <div class="col-md-10">
                        Add User
                    </div>
                    <div class="col-md-2">
                    <a href="{{url('User')}}" class="btn btn-gradient-success btn-md btn-icon-text">
                        <i class="mdi mdi-reload btn-icon-prepend"></i> Back </a>
                    </div>
                </div>
            </h4>

            <form class="cmxform" id="dataFrom" method="" action="">
              @csrf
              <fieldset>
              <div class="form-group">
                <label for="name">Name</label>
                <input id="name" class="form-control" name="name" type="text">
                <label id="error-name" for="name" class="validation-invalid-label text-danger mt-1" ></label>
              </div>
              <div class="form-group">
                <label for="email">Email</label>
                <input id="email" class="form-control" name="email" type="text">
                <label id="error-email" for="email" class="validation-invalid-label text-danger mt-1" ></label>
              </div>
              <div class="form-group">
                <label for="phone">Phone</label>
                <input id="phone" class="form-control" name="phone" type="text">
                <label id="error-phone" for="phone" class="validation-invalid-label text-danger mt-1" ></label>
              </div>
              <div class="form-group">
                <label for="password">Password</label>
                <input id="password" class="form-control" name="password" type="text">
                <label id="error-password" for="password" class="validation-invalid-label text-danger mt-1" ></label>
              </div>
              <div class="form-group">
                <label for="roles">Roles</label>
                <select class="form-control form-control-sm" name="roles[]" id="roles" multiple>
                  @foreach ($roles as $item)
                    <option value="{{$item}}">{{$item}}</option>
                  @endforeach
                </select>
                <label id="error-roles" for="roles" class="validation-invalid-label text-danger mt-1" ></label>
              </div>
              <div class="form-group">
                <label id="error-save"  class="validation-invalid-label text-danger" ></label>
              </div>

              <button class="btn btn-primary" id="btnSubmit" type="button" value="Submit">Submit</button>
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
    $("#btnSubmit").on("click", function () { SaveData("{{url('User')}}", $("#dataFrom").serialize()); });

</script>
@endsection
