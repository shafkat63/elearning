@extends('layout.app')
@section('title', 'Add Subject')
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
                        Add Content
                    </div>
                    <div class="col-md-1">
                    <a href="{{url('Subject')}}" class="btn btn-gradient-success btn-sm btn-icon-text">
                        <i class="mdi mdi-arrow-left btn-icon-prepend"></i> Back </a>
                    </div>
                </div>
            </h4>

          <form class="cmxform" id="dataFrom" method="" action="">
            @csrf
            <fieldset>
              <div class="form-group">
                <label for="firstname">Content Name</label>
                <input id="firstname" class="form-control" name="content_name" type="text">
                <label id="error-name" for="name" class="validation-invalid-label text-danger mt-1" ></label>

              </div>
              <div class="form-group">
                <label for="content_details">Content Detatils</label>
                <textarea id="my-editor" name="content_details" ></textarea>
                <label id="error-content_details" for="name" class="validation-invalid-label text-danger mt-1" ></label>

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
<script src="https://cdnjs.cloudflare.com/ajax/libs/tinymce/7.0.1/tinymce.min.js" referrerpolicy="origin"></script>

<script>
  tinymce.init({
      selector: 'textarea',
      plugins: [
        "advlist", "anchor", "autolink", "charmap", "code", "fullscreen",
        "help", "image", "insertdatetime", "link", "lists", "media",
        "preview", "searchreplace", "table", "visualblocks", "accordion"
        ],
      height: 1200,
      toolbar: "undo redo |link image accordion | styles | bold italic underline strikethrough | align | bullist numlist",
  });
</script>
<script>
$("#btnSubmit").on("click", function () {
  var content = tinymce.get('my-editor').getContent();
  $('#my-editor').val(content);
  SaveData("{{url('Content')}}", $("#dataFrom").serialize()); });

</script>
@endsection
