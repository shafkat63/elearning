@extends('layout.app')
@section('style')
    <!-- Quill -->
    <link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
    <script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>

    <!-- KaTeX -->
    <link href="https://cdn.jsdelivr.net/npm/katex/dist/katex.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/katex/dist/katex.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/quill-formula-latex-module/dist/quill-formula-latex.js"></script>
@endsection
@section('title', 'Question Add')
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
                        Add Question
                    </div>
                    <div class="col-md-1">
                    <a href="{{url('Question')}}" class="btn btn-gradient-success btn-sm btn-icon-text">
                        <i class="mdi mdi-arrow-left btn-icon-prepend"></i> Back </a>
                    </div>
                </div>
            </h4>

            <form class="cmxform" id="dataFrom"  action="{{url('Question')}}">
              @csrf
              <fieldset>
                <div class="form-group">
                  <div class="row">
                    <div class="col-md-4">
                      <label for="subject_id">Subject</label>
                      <select class="form-control form-control-sm" name="subject_id" id="subject_id">
                        <option value="">Select Subject</option>
                        @foreach ($subject   as $item)
                          <option value="{{$item->id}}">{{$item->name}}</option>
                        @endforeach
                      </select>
                      <label id="error-subject_id" for="name" class="validation-invalid-label text-danger" ></label>
                    </div>
                    <div class="col-md-4">
                      <label for="paper_id">Paper</label>
                      <select class="form-control form-control-sm" name="paper_id" id="paper_id">
                        <option value="">Select Paper</option>
                      </select>
                      <label id="error-paper_id" for="name" class="validation-invalid-label text-danger" ></label>
                    </div>
                    <div class="col-md-4">
                      <label for="chapter_id">Chapter</label>
                      <select class="form-control form-control-sm" name="chapter_id" id="chapter_id">
                        <option value="">Select Chapter</option>
                      </select>
                      <label id="error-chapter_id" for="name" class="validation-invalid-label text-danger" ></label>
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <label for="question_namess">Question Name </label>
                  <textarea class="form-control" name="question_name" id="question_name"></textarea>
                  <label id="error-question_name" for="name" class="validation-invalid-label text-danger" ></label>
                </div>
                <div class="form-group">
                  <div class="row">
                    <div class="col-md-13 d-flex align-items-center justify-content-center"> <!-- Adjust width as needed -->
                      <input type="radio" class="form-check-input" style="margin: 0 10px 0 25px" name="ckOption[]" id="optionanser" value="1">
                      <textarea class="form-control" name="option[]" id="option1"></textarea>
                      <label id="error-option" for="name" class="validation-invalid-label text-danger" ></label>
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <div class="row">
                    <div class="col-md-13 d-flex align-items-center justify-content-center">
                      <input type="radio" class="form-check-input" style="margin: 0 10px 0 25px"" name="ckOption[]" id="optionanser" value="1">
                      <textarea class="form-control" name="option[]" id="option2"></textarea>
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <div class="row">
                    <div class="col-md-12 d-flex align-items-center">
                      <input type="radio" class="form-check-input" style="margin: 0 10px 0 25px" name="ckOption[]" id="optionanser" value="1">

                      <textarea class="form-control" name="option[]" id="option3"></textarea>
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <div class="row">
                    <div class="col-md-31 d-flex align-items-center justify-content-center">
                      <input type="radio" class="form-check-input" style="margin: 0 10px 0 25px" name="ckOption[]" id="optionanser" value="1">
                      <textarea class="form-control" name="option[]" id="option4"></textarea>
                    </div>
                  </div>
                </div>

                <div class="form-group">
                  <label id="error-save"  class="validation-invalid-label text-danger mt-1" ></label>
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

$('#btnSubmit').click(function() {
  var form = document.getElementById('dataFrom');
  var radioButtons = document.querySelectorAll('input[name="ckOption[]"]');
  var checkedValues = Array.from(radioButtons).map(button => button.checked ? 1 : 0);
  console.log(checkedValues);
  appendHiddenInputs(form, checkedValues);
  $.ajax({
    type: "POST",
    url: "{{url('Question')}}",
    data: $('#dataFrom').serialize(), // Serialize the form data
    success: function(response) {
      console.log(response);
       if (response.code == '200') {
            swal({
                title: response.status,
                text: response.msg,
            }).then((value) => {
                if (value) {
                    window.location.href =  response.routeUrl;
                }
            });
        } else if (response.status == 'error') {
            swal({
              title: "Error",
              text: "Fill the all requried Options",
              timer: 2000
            });
            $('.validation-invalid-label').html('');
            $.each(response.data, function (field, messages) {
                $('#error-' + field).html(messages.join('<br>'));
            });
        } else{
            $("#error-save").html("An unexpected error occurs during processing. Please try again.");
        }
    },
    error: function(xhr, status, error) {
      console.log(error);
        $("#error-save").html("An unexpected error occurs during processing. Please try again.1");
    }
  });
});

$("#subject_id").change(function () {
    var subject_id = this.value;
    ShowPaper(subject_id);

    var markup = "<option value=''>Select Chapter</option>";
    $("#chapter_id").html(markup).show();
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


      }

  });
}
$("#paper_id").change(function () {
    var paper_id = this.value;
    ShowChapter(paper_id);
});
function ShowChapter(paper_id){
  var csrf_tokens = document.querySelector('meta[name="csrf-token"]').content;
  url = "{{ url('getChapter') }}";
  $.ajax({
      url: url,
      type: 'POST',
      data: {'paper_id': paper_id,"_token": csrf_tokens},
      datatype: 'JSON',
      success: function (data) {
          console.log(data);
          var category = $.parseJSON(data);
          if (category != '') {
              var markup = "<option value=''>Select Chapter</option>";
              for (var x = 0; x < category.length; x++) {
                  markup += "<option value=" + category[x].id + ">" + category[x].name + "</option>";
              }
              $("#chapter_id").html(markup).show();
          } else {
              var markup = "<option value=''>Select Chapter</option>";
              $("#chapter_id").html(markup).show();
          }


      }

  });
}
function appendHiddenInputs(form, values) {
    values.forEach(function(value, index) {
        // Create a hidden input element
        var input = document.createElement('input');
        input.type = 'hidden';
        input.name = 'ckOption[' + index + ']'; // Set the name with index
        input.value = value; // Set the value from the array

        // Append the hidden input to the form
        form.appendChild(input);
    });
}
</script>
@endsection
