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
    .file-preview {
        margin-top: 10px;
    }
    .audio-preview, .video-preview {
        margin-top: 10px;
    }
    .preview-container {
        max-width: 100%;
        height: auto;
        overflow: hidden;
    }
    .preview-container img,
    .preview-container video,
    .preview-container audio {
        max-width: 100%;
        height: auto;
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
                <select class="form-select" id="type" name="type" required onchange="checkFileType()">
                    <option value="">Select Media Type</option>
                    <option value="Image">Image</option>
                    <option value="Audio">Audio</option>
                    <option value="Video">Video</option>
                </select>
            </div>
            <div class="form-group" id="fileUploadGroup">
                <label for="file" class="form-label">Upload File</label>
                <input type="file" class="form-control" id="file" name="file" onchange="previewFile()" required />
            </div>
            <div class="form-group" id="filePreview" style="display: none;">
                <div class="file-preview preview-container">
                    <img id="previewImg" src="#" alt="File Preview" style="display: none;">
                    <video id="videoPreview" controls style="display: none;">
                        <source id="videoSource" src="#" type="video/mp4">
                        Your browser does not support the video element.
                    </video>
                    <audio id="audioPreview" controls style="display: none;">
                        <source id="audioSource" src="#" type="audio/mpeg">
                        Your browser does not support the audio element.
                    </audio>
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Upload</button>
        </form>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    function checkFileType() {
        var fileType = document.getElementById('type').value;
        var fileUploadGroup = document.getElementById('fileUploadGroup');
        var filePreview = document.getElementById('filePreview');

        // Show or hide file upload and preview based on selected type
        if (fileType === 'Image') {
            fileUploadGroup.style.display = 'block';
            filePreview.style.display = 'block';
            document.getElementById('previewImg').style.display = 'block';
            document.getElementById('videoPreview').style.display = 'none';
            document.getElementById('audioPreview').style.display = 'none';
        } else if (fileType === 'Audio') {
            fileUploadGroup.style.display = 'block';
            filePreview.style.display = 'block';
            document.getElementById('previewImg').style.display = 'none';
            document.getElementById('videoPreview').style.display = 'none';
            document.getElementById('audioPreview').style.display = 'block';
        } else if (fileType === 'Video') {
            fileUploadGroup.style.display = 'block';
            filePreview.style.display = 'block';
            document.getElementById('previewImg').style.display = 'none';
            document.getElementById('videoPreview').style.display = 'block';
            document.getElementById('audioPreview').style.display = 'none';
        } else {
            fileUploadGroup.style.display = 'block';
            filePreview.style.display = 'none';
        }
    }

    function previewFile() {
        var fileType = document.getElementById('type').value;
        var file = document.getElementById('file').files[0];
        var reader = new FileReader();

        reader.onloadend = function () {
            if (fileType === 'Image') {
                document.getElementById('previewImg').src = reader.result;
                document.getElementById('previewImg').style.display = 'block';
                document.getElementById('videoPreview').style.display = 'none';
                document.getElementById('audioPreview').style.display = 'none';
            } else if (fileType === 'Audio') {
                document.getElementById('audioSource').src = reader.result;
                document.getElementById('audioPreview').load();
                document.getElementById('previewImg').style.display = 'none';
                document.getElementById('videoPreview').style.display = 'none';
                document.getElementById('audioPreview').style.display = 'block';
            } else if (fileType === 'Video') {
                document.getElementById('videoSource').src = reader.result;
                document.getElementById('videoPreview').load();
                document.getElementById('previewImg').style.display = 'none';
                document.getElementById('videoPreview').style.display = 'block';
                document.getElementById('audioPreview').style.display = 'none';
            }
        };

        if (file) {
            reader.readAsDataURL(file);
        } else {
            // Handle case where no file is selected
            document.getElementById('previewImg').src = '#';
            document.getElementById('videoSource').src = '#';
            document.getElementById('audioSource').src = '#';
            document.getElementById('previewImg').style.display = 'none';
            document.getElementById('videoPreview').style.display = 'none';
            document.getElementById('audioPreview').style.display = 'none';
        }
    }

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
