@extends('layout.app')
@section('title', 'Chapter Edit')
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
                <a href="{{url('Chapter')}}" class="btn btn-gradient-success btn-sm btn-icon-text">
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
                    <option value="{{$item->id}}" {{ $item->id == $chapter->subject_id ? 'selected' : '' }}>{{$item->name}}</option>
                  @endforeach
                </select>
                <label id="error-subject_id" for="name" class="validation-invalid-label text-danger mt-1" ></label>
              </div>
              <div class="form-group">
                <label for="paper_id">Paper</label>
                <select class="form-control form-control-sm" name="paper_id" id="paper_id">
                  <option value="">Select Paper</option>
                </select>
                <label id="error-paper_id" for="name" class="validation-invalid-label text-danger mt-1" ></label>
              </div>
              <div class="form-group">
                <label for="firstname">Chapter Name</label>
                <input id="id" name="id" value="{{$chapter->id}}" type="hidden">
                <input id="firstname" class="form-control" name="name" value="{{$chapter->name}}" type="text">
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
$("#btnSubmit").on("click", function () { SaveData("{{ url('Chapter') }}" , $("#dataFrom").serialize());});

ShowPaper({{$chapter->subject_id}});

$("#subject_id").change(function () {
    var subject_id = this.value;
    ShowPaper(subject_id);
});

function ShowPaper(subject_id){

  var csrf_tokens = document.querySelector('meta[name="csrf-token"]').content;
  url = "{{ url('getPaper') }}";
  $.ajax({
      url: url,
      type: 'POST',
      data: {'subject_id': subject_id,"_token": csrf_tokens},
      datatype: 'JSON',
      success: function (data) {
          console.log(data);
          var category = $.parseJSON(data);
          if (category != '') {
              var markup = "<option value=''>Select Paper</option>";
              for (var x = 0; x < category.length; x++) {
                  markup += "<option value=" + category[x].id + ">" + category[x].name + "</option>";
              }
              $("#paper_id").html(markup).show();

          } else {
              var markup = "<option value=''>Select Paper</option>";
              $("#paper_id").html(markup).show();
          }

        var paper_id_value = "{{ $chapter->paper_id }}";
        $("#paper_id").val(paper_id_value);
      }

  });
}
</script>
@endsection
