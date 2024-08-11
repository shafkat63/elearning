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
                Edit CourseType
              </div>
              <div class="col-md-1">
                <a href="{{ url('CourseType') }}" class="btn btn-gradient-success btn-sm btn-icon-text">
                  <i class="mdi mdi-arrow-left btn-icon-prepend"></i> Back 
                </a>
              </div>
            </div>
          </h4>

          <!-- The form now uses the PATCH method and includes the course type ID in the action URL -->
          <form class="cmxform" id="dataForm" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PATCH')
            <fieldset>
              <div class="form-group">
                <label for="name">Name</label>
                <input id="name" class="form-control" name="name" type="text" value="{{ $courseType->name }}" required>
                <label id="error-name" for="name" class="validation-invalid-label text-danger mt-1"></label>
              </div>

              <div class="form-group">
                <label for="status">Status</label>
                <select id="status" class="form-control" name="status" required>
                  <option value="active" {{ $courseType->status == 'active' ? 'selected' : '' }}>Active</option>
                  <option value="inactive" {{ $courseType->status == 'inactive' ? 'selected' : '' }}>Inactive</option>
                </select>
                <label id="error-status" for="status" class="validation-invalid-label text-danger mt-1"></label>
              </div>

              <div class="form-group">
                <label for="thumbnail">Thumbnail</label>
                <input id="thumbnail" class="form-control-file" name="thumbnail" type="file" accept="image/*">
                <label id="error-thumbnail" for="thumbnail" class="validation-invalid-label text-danger mt-1"></label>
              </div>

              <!-- Image Preview -->
              <div class="form-group" id="imagePreviewContainer" style="display: {{ $courseType->thumbnail ? 'block' : 'none' }};">
                <label for="imagePreview">Image Preview</label>
                <img id="imagePreview" class="img-thumbnail" src="{{ $courseType->thumbnail ? asset('storage/'.$courseType->thumbnail) : '' }}" style="max-width: 200px; max-height: 200px;" />
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
<script src="{{ asset('assets/js/customFileUpdate.js') }}"></script>
<script>
  // Show image preview when a new file is selected
  document.getElementById('thumbnail').addEventListener('change', function(event) {
    var file = event.target.files[0];
    var reader = new FileReader();

    reader.onload = function(e) {
      var imagePreview = document.getElementById('imagePreview');
      imagePreview.src = e.target.result;

      // Show the container with the image preview
      document.getElementById('imagePreviewContainer').style.display = 'block';
    };

    reader.readAsDataURL(file);
  });

  // Handle form submission
  $("#btnSubmit").on("click", function () {
    SaveData("{{ url('CourseType/'.$courseType->id) }}", new FormData($("#dataForm")[0]));
  });
</script>
@endsection
