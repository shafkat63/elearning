@extends('layout.app')
@section('title', 'Upload Files')
@section('mainNav')
@include('layout.nav')
@endsection
@section('mainContent')
<style>
    .form-container {
        max-width: 600px;
        margin: 50px auto;
        padding: 30px;
        background-color: #f7f7f7;
        border-radius: 10px;
        box-shadow: 0 0 20px rgba(0, 0, 0, 0.2);
    }
    .form-heading {
        text-align: center;
        margin-bottom: 30px;
    }
    form {
        width: 100%;
    }
    .form-group {
        margin-bottom: 15px;
    }
    .form-label {
        font-weight: bold;
    }
    .form-control,
    .form-select {
        width: 100%;
        padding: 10px;
        font-size: 16px;
        border: 1px solid #ccc;
        border-radius: 5px;
        box-sizing: border-box;
    }

    .btn-primary {
        width: auto;
        padding: 10px 20px;
        font-size: 16px;
        border: 1px solid #ccc;
        border-radius: 5px;
        cursor: pointer;
    }
</style>
<div class="container">
    <div class="table-responsive form-container">
        @if ($message = Session::get('success'))
        <div id="uploadSuccessAlert" class="alert alert-success" style="display: none">
            {{ $message }}
        </div>
        @endif
        <h2 class="form-heading">Upload Files</h2>
        <form id="uploadForm" class="cmxform" action="{{ route('Files.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control" id="name" name="name" required />
            </div>
            <div class="form-group">
                <label for="type" class="form-label">Select Media Type</label>
                <select class="form-select" id="type" name="type" required>
                    <option value="">Select Media Type</option>
                    <option value="Image">Image</option>
                    <option value="Audio">Audio</option>
                    <option value="Video">Video</option>
                </select>
            </div>
            <div class="form-group">
                <label for="file" class="form-label">Upload File</label>
                <input type="file" class="form-control" id="file" name="file" required />
            </div>
            <button type="submit" class="btn btn-primary">Upload</button>
        </form>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    $(document).ready(function () {
        $("#uploadForm").submit(function (event) {
            event.preventDefault();
            $.ajax({
                url: $(this).attr("action"),
                type: "POST",
                data: new FormData(this),
                processData: false,
                contentType: false,
                headers: {
                    "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
                },
                success: function (response) {
                    // Clear the form fields
                    $('#uploadForm')[0].reset();

                    Swal.fire({
                        icon: "success",
                        title: "File uploaded successfully.",
                        showConfirmButton: true,
                    }).then(function () {
                        window.location.reload();
                    });
                },
                error: function (xhr) {
                    console.error(xhr.responseText);
                    Swal.fire("Error!", "Failed to upload file.", "error");
                },
            });
        });
    });
</script>
@endsection
