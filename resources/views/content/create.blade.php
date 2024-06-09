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
