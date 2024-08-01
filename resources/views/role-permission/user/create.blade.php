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
                    <div class="col-md-10">
                        Add User
                    </div>
                    <div class="col-md-2">
                    <a href="{{ url('User') }}" class="btn btn-gradient-success btn-md btn-icon-text">
                        <i class="mdi mdi-reload btn-icon-prepend"></i> Back
                    </a>
                    </div>
                </div>
            </h4>

            <form class="cmxform" id="dataForm" method="post" action="{{ url('User') }}" enctype="multipart/form-data">
              @csrf
              <fieldset>
                <div class="form-group">
                  <label for="name">Name</label>
                  <input id="name" class="form-control" name="name" type="text">
                  <span id="error-name" class="validation-invalid-label text-danger mt-1"></span>
                </div>
                <div class="form-group">
                  <label for="email">Email</label>
                  <input id="email" class="form-control" name="email" type="text">
                  <span id="error-email" class="validation-invalid-label text-danger mt-1"></span>
                </div>
                <div class="form-group">
                  <label for="phone">Phone</label>
                  <input id="phone" class="form-control" name="phone" type="text">
                  <span id="error-phone" class="validation-invalid-label text-danger mt-1"></span>
                </div>
                <div class="form-group">
                  <label for="userType">User Type</label>
                  <div class="input-group">
                    <div class="input-group-prepend bg-transparent">
                      <span class="input-group-text bg-transparent border-right-0">
                        <i class="mdi mdi-account-multiple text-primary"></i>
                      </span>
                    </div>
                    <select name="userType" class="form-control form-control-sm border-left-0" id="userType">
                      <option value="" selected>Select Type</option>
                      <option value="basic">Basic</option>
                      <option value="intermediate">Intermediate</option>
                      <option value="advanced">Advanced</option>
                    </select>
                  </div>
                  <span id="error-userType" class="validation-invalid-label text-danger mt-1"></span>
                </div>
                <div class="form-group">
                  <label for="password">Password</label>
                  <input id="password" class="form-control" name="password" type="password">
                  <span id="error-password" class="validation-invalid-label text-danger mt-1"></span>
                </div>
                <div class="form-group">
                  <div class="input-group">
                    <div class="input-group-prepend bg-transparent">
                      <span class="input-group-text bg-transparent border-right-0">
                        <i class="mdi mdi-account-multiple text-primary"></i>
                      </span>
                    </div>

                  <label for="roles">Roles</label>
                  <select class="form-control form-control-sm border-left-0" name="roles[]" id="roles" multiple>
                    @foreach ($roles as $role)
                      <option value="{{ $role }}">{{ $role }}</option>
                    @endforeach
                  </select>
                  <span id="error-roles" class="validation-invalid-label text-danger mt-1"></span>
                </div>
                </div>
                <div class="form-group">
                  <label for="avatar" class="form-label">Avatar:
                    <input id="avatar" class="form-control" name="avatar" type="file" accept="image/*"> 
                  </label>
                  <span id="error-avatar" class="validation-invalid-label text-danger mt-1"></span>
                </div>
                <div class="form-group">
                  <img id="avatarPreview" src="#" alt="Image Preview" style="display:none; max-width:200px; max-height:200px; margin-top:10px;"/>
                </div>
                <div class="form-group">
                  <span id="error-save" class="validation-invalid-label text-danger"></span>
                </div>

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
<!-- <script src="{{ asset('assets/js/custom.js') }}"></script> -->
<script>
    $("#btnSubmit").on("click", function () { 
        var formData = new FormData($("#dataForm")[0]); // Create FormData object
        SaveData("{{ url('User') }}", formData); // Pass FormData object
    });

    function SaveData(reqURL, reqData) {
        console.log(reqURL + ' <=> ' + reqData);

        $.ajax({
            type: "POST",
            url: reqURL,
            data: reqData,
            contentType: false, // Needed for FormData
            processData: false, // Needed for FormData
            success: function (response) {
                console.log(response);
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
                    $('.validation-invalid-label').html('');
                    $.each(response.data, function (field, messages) {
                        $('#error-' + field).html(messages.join('<br>'));
                    });
                } else {
                    $('.validation-invalid-label').html('');
                    $("#error-save").html("An unexpected error occurred during processing. Please try again.");
                }
            },
            error: function (xhr, status, error) {
                console.log(xhr.responseText);
                $('.validation-invalid-label').html('');
                $("#error-save").html("An unexpected error occurred during processing. Please try again.");
            }
        });
    }

    // Image preview function
    document.getElementById('avatar').onchange = function (event) {
        var reader = new FileReader();
        reader.onload = function () {
            var output = document.getElementById('avatarPreview');
            output.src = reader.result;
            output.style.display = 'block';
        };
        reader.readAsDataURL(event.target.files[0]);
    };
</script>
@endsection
