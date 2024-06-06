@extends('layout.app')
@section('title', 'Subject Edit')
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
                    Edit Subject
                </div>
                <div class="col-md-1">
                <a href="{{url('Subject')}}" class="btn btn-gradient-success btn-sm btn-icon-text">
                    <i class="mdi mdi-arrow-left btn-icon-prepend"></i> Back </a>
                </div>
            </div>
          </h4>
          <form class="cmxform" id="dataFrom" method="#" action="#">
            @csrf
            <fieldset>
              <div class="form-group">
                <label for="firstname">Subject Name</label>
                <input id="id" name="id" value="{{$subject->id}}" type="hidden">
                <input id="firstname" class="form-control" name="name" value="{{$subject->name}}" type="text">
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
    <script src="public/assets/js/sweetalert.min.js"></script>
    <script src="public/assets/js/custom.js"></script>
<script>
  $("#btnSubmit").on("click", function () { SaveData("{{ url('Subject') }}" , $("#dataFrom").serialize());});

</script>
@endsection
