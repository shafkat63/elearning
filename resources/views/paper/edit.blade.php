@extends('layout.app')
@section('title', 'Paper Edit')
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
                <label for="subject_id">Subject</label>
                <select class="form-control form-control-sm" name="subject_id" id="subject_id">
                  <option value="">Select Subject</option>
                  @foreach ($subject as $item)
                      <option value="{{ $item->id }}" {{ $item->id == $paper->subject_id ? 'selected' : '' }}>
                          {{ $item->name }}
                      </option>
                  @endforeach
                </select>
                <label id="error-subject_id" for="subject_id" class="validation-invalid-label text-danger mt-1" ></label>
              </div>
              <div class="form-group">
                <label for="firstname">Paper Name</label>
                <input id="id"  name="id" value="{{$paper->id}}" type="hidden">
                <input id="firstname" class="form-control" name="name" value="{{$paper->name}}" type="text">
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
  $("#btnSubmit").on("click", function () { SaveData("{{ url('Paper') }}" , $("#dataFrom").serialize());});

</script>
@endsection
