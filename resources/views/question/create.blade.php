@extends('layout.app')

@section('style')
    <!-- Quill -->
    <link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
    <script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>

    <!-- TinyMCE -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/tinymce/7.0.1/skins/ui/oxide/skin.min.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tinymce/7.0.1/tinymce.min.js" referrerpolicy="origin"></script>

    <!-- KaTeX -->
    <link href="https://cdn.jsdelivr.net/npm/katex/dist/katex.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/katex/dist/katex.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/quill-formula-latex-module/dist/quill-formula-latex.js"></script>
@endsection

@section('title', 'Add Question')

@section('mainNav')
    @include('layout.nav')
@endsection

@section('mainContent')
<div class="content-wrapper m-0 p-0 pt-2 p-lg-3">
  <div class="row m-0 m-md-0 m-lg-1">
    <div class="col-lg-12">
      <div class="card">
        <div class="card-body p-2 p-sm-2 p-md-2 p-lg-4">
            <h4 class="card-title">
                <div class="row">
                    <div class="col-md-11">Add Question</div>
                    <div class="col-md-1">
                    <a href="{{ url('Question') }}" class="btn btn-gradient-success btn-sm btn-icon-text">
                        <i class="mdi mdi-arrow-left btn-icon-prepend"></i> Back 
                    </a>
                    </div>
                </div>
            </h4>

            <form id="dataForm" action="{{ url('Question') }}" method="POST">
              @csrf
              <fieldset>
                <!-- Subject, Paper, Chapter Dropdowns -->
                <div class="form-group">
                  <div class="row">
                    <div class="col-md-4">
                      <label for="subject_id">Subject</label>
                      <select class="form-control form-control-sm" name="subject_id" id="subject_id">
                        <option value="">Select Subject</option>
                        @foreach ($subject as $item)
                          <option value="{{ $item->id }}">{{ $item->name }}</option>
                        @endforeach
                      </select>
                      <label id="error-subject_id" class="validation-invalid-label text-danger"></label>
                    </div>
                    <div class="col-md-4">
                      <label for="paper_id">Paper</label>
                      <select class="form-control form-control-sm" name="paper_id" id="paper_id">
                        <option value="">Select Paper</option>
                      </select>
                      <label id="error-paper_id" class="validation-invalid-label text-danger"></label>
                    </div>
                    <div class="col-md-4">
                      <label for="chapter_id">Chapter</label>
                      <select class="form-control form-control-sm" name="chapter_id" id="chapter_id">
                        <option value="">Select Chapter</option>
                      </select>
                      <label id="error-chapter_id" class="validation-invalid-label text-danger"></label>
                    </div>
                  </div>
                </div>

                <!-- Question Name -->
                <div class="form-group">
                  <label for="question_name">Question Name</label>
                  <textarea class="form-control" name="question_name" id="question_name"></textarea>
                  <label id="error-question_name" class="validation-invalid-label text-danger"></label>
                </div>

                <!-- Options with Radio Buttons -->
                @for($i = 0; $i < 4; $i++)
                <div class="form-group">
                  <div class="row">
                    <div class="col-md-12 d-flex align-items-center">
                      <input type="radio" class="form-check-input" style="margin-right: 10px" name="ckOption[]" value="{{ $i }}">
                      <textarea class="form-control" name="option[]" id="option_{{ $i }}"></textarea>
                    </div>
                  </div>
                </div>
                @endfor

                <!-- Error Display -->
                <div class="form-group">
                  <label id="error-save" class="validation-invalid-label text-danger mt-1"></label>
                </div>

                <!-- Submit Button -->
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
  // Initialize TinyMCE on all textareas
  tinymce.init({
    selector: 'textarea',
    plugins: "advlist autolink link image lists charmap print preview fullscreen",
    toolbar: "undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent",
    height: 200
  });

  // Submit Form
  $('#btnSubmit').click(function() {
    // Get content of TinyMCE textareas
    var questionNameContent = tinymce.get('question_name').getContent();
    $('#question_name').val(questionNameContent);

    @for($i = 0; $i < 4; $i++)
      var optionContent_{{ $i }} = tinymce.get('option_{{ $i }}').getContent();
      $('#option_{{ $i }}').val(optionContent_{{ $i }}); // Update each option
    @endfor

    // Get radio button values (1 for checked, 0 for unchecked)
    var form = document.getElementById('dataForm');
    var radioButtons = document.querySelectorAll('input[name="ckOption[]"]');
    var checkedValues = Array.from(radioButtons).map(button => button.checked ? 1 : 0);
    appendHiddenInputs(form, checkedValues);

    // Submit via AJAX
    $.ajax({
      type: "POST",
      url: "{{ url('Question') }}",
      data: $('#dataForm').serialize(),
      success: function(response) {
        if (response.code == '200') {
          swal({
              title: response.status,
              text: response.msg,
          }).then((value) => {
              if (value) {
                  window.location.href = response.routeUrl;
              }
          });
        } else if (response.status == 'error') {
          showErrors(response.data);
        } else {
          $("#error-save").html("An unexpected error occurred. Please try again.");
        }
      },
      error: function(xhr) {
        $("#error-save").html("An unexpected error occurred. Please try again.");
      }
    });
  });

  // Append hidden inputs for checked radio button values
  function appendHiddenInputs(form, values) {
    values.forEach(function(value, index) {
      var input = document.createElement('input');
      input.type = 'hidden';
      input.name = 'ckOption[' + index + ']'; // Append hidden field for radio buttons
      input.value = value;
      form.appendChild(input);
    });
  }

  // Display validation errors
  function showErrors(errors) {
    $('.validation-invalid-label').html(''); // Clear previous errors
    $.each(errors, function (field, messages) {
      $('#error-' + field).html(messages.join('<br>'));
    });
  }

  // Dynamic dropdown logic for Paper and Chapter
  $("#subject_id").change(function() {
    var subject_id = this.value;
    updateDropdown("getPaper", { subject_id: subject_id }, "#paper_id");
    $("#chapter_id").html("<option value=''>Select Chapter</option>");
  });

  $("#paper_id").change(function() {
    var paper_id = this.value;
    updateDropdown("getChapter", { paper_id: paper_id }, "#chapter_id");
  });

  function updateDropdown(url, data, dropdownId) {
    var csrf_token = $('meta[name="csrf-token"]').attr('content');
    data._token = csrf_token;

    $.post("{{ url('') }}/" + url, data, function(response) {
      var options = "<option value=''>Select</option>";
      $.each(response, function(index, item) {
        options += `<option value="${item.id}">${item.name}</option>`;
      });
      $(dropdownId).html(options);
    }, 'json');
  }
</script>
@endsection
