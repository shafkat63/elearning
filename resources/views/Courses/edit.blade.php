@extends('layout.app')
@section('title', 'Edit Course')
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
                Edit Course
              </div>
              <div class="col-md-1">
                <a href="{{ url('Course') }}" class="btn btn-gradient-success btn-sm btn-icon-text">
                  <i class="mdi mdi-arrow-left btn-icon-prepend"></i> Back </a>
              </div>
            </div>
          </h4>

          <form class="cmxform" id="dataForm" action="">
            @csrf
         
            <fieldset>
              <div class="form-group">
                <label for="name">Name</label>
                <input id="name" class="form-control" name="name" type="text" value="{{ old('name', $course->name) }}"
                  required>
                <label id="error-name" for="name" class="validation-invalid-label text-danger mt-1"></label>
              </div>
              <input id="id"  name="id" type="hidden" value="{{$course->id}}">


              <div class="form-group">
                <label for="courseType">Course Type</label>

                <select class="form-control form-control-sm" name="courseType" id="courseType">
                  <option value="">Course Type</option>
                  @foreach ($courseTypes as $courseType)
                  <option value="{{ $courseType->id }}" {{ $course->course_type == $courseType->id ? 'selected' : ''
                    }}>{{ $courseType->name }}</option>
                  @endforeach
                </select>

              </div>

              <div class="form-group">
                <label for="content">Content</label>
                <textarea id="content" class="form-control" name="content"
                  required>{{ old('content', $course->content) }}</textarea>
                <label id="error-content" for="content" class="validation-invalid-label text-danger mt-1"></label>
              </div>

              <div class="form-group">
                <label for="description">Description</label>
                <textarea id="description" class="form-control" name="description"
                  required>{{ old('description', $course->description) }}</textarea>
                <label id="error-description" for="description"
                  class="validation-invalid-label text-danger mt-1"></label>
              </div>

              <div class="form-group">
                <label for="thumble">Thumble</label>
                <input id="thumble" class="form-control" name="thumble" type="text"
                  value="{{ old('thumble', $course->thumble) }}" required>
                <label id="error-thumble" for="thumble" class="validation-invalid-label text-danger mt-1"></label>
              </div>

              <button class="btn btn-primary" id="btnSubmit" type="button" value="Submit">Update</button>
            </fieldset>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection

@section('script')
<script src="https://cdnjs.cloudflare.com/ajax/libs/tinymce/7.0.1/tinymce.min.js" referrerpolicy="origin"></script>
<script src="{{ asset('assets/js/sweetalert.min.js') }}"></script>
<script src="{{ asset('assets/js/customupdate.js') }}"></script>

<script>
  tinymce.init({
      selector: 'textarea',
      plugins: [
        "advlist", "anchor", "autolink", "charmap", "code", "fullscreen",
        "help", "image", "insertdatetime", "link", "lists", "media",
        "preview", "searchreplace", "table", "visualblocks", "accordion"
        ],
      height: 400,
      toolbar: "undo redo |link image accordion | styles | bold italic underline strikethrough | align | bullist numlist",
  });

  $("#btnSubmit").on("click", function () {
    var courseId = $('#id').val();

    var content = tinymce.get('content').getContent();
    var description = tinymce.get('description').getContent();
    $('#id').val();
    $('#content').val(content);
    $('#description').val(description);
    var url = "{{ url('Course') }}/" + courseId;
    SaveData(url, $("#dataForm").serialize());


    
  });
</script>
@endsection