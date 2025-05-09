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
                <div class="col-md-11">
                    Edit Permission
                </div>
                <div class="col-md-1">
                <a href="{{url('Permission')}}" class="btn btn-gradient-success btn-sm btn-icon-text">
                    <i class="mdi mdi-arrow-left btn-icon-prepend"></i> Back </a>
                </div>
            </div>
          </h4>
          <form class="cmxform" id="dataFrom" method="#" action="#">
            @csrf
            <fieldset>
              <div class="form-group">
                <label for="firstname">Permission Name</label>
                <input id="id" name="id" value="{{$permission->id}}" type="hidden">
                <input id="firstname" class="form-control" name="name" value="{{$permission->name}}" type="text">
                <label id="error-name" for="name" class="validation-invalid-label text-danger mt-1" ></label>

              </div>
              <div class="form-group">
                <label id="error-save"  class="validation-invalid-label text-danger mt-1" ></label>
              </div>

              <button class="btn btn-primary" id="btnSubmit" type="button" value="Update">Update</button>
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
  $("#btnSubmit").on("click", function () { SaveData("{{ url('Permission') }}" , $("#dataFrom").serialize());});

</script>
@endsection
