@extends('layout.app')

@section('title', 'Edit File')

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

    .file-preview {
        margin-top: 20px;
    }

    .preview-container {
        margin-top: 10px;
    }

    .preview-image {
        max-width: 100%;
    }

    .preview-video {
        max-width: 100%;
    }

    .preview-audio {
        width: 100%;
        height: auto;
    }
</style>

<div class="container">
    <div class="table-responsive form-container">
        @if ($message = Session::get('success'))
        <div id="uploadSuccessAlert" class="alert alert-success" style="display: block">
            {{ $message }}
        </div>
        @endif

        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        <div>
            <h2 class="form-heading">Edit File</h2>
            <form id="editForm" class="cmxform" action="{{ route('Files.update', $file->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PATCH')

                <div class="form-group">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" name="name" class="form-control" value="{{ $file->name }}" required>
                </div>

                <div class="form-group">
                    <label for="filetype">File Type</label>
                    <select name="filetype" id="filetype" class="form-control" required>
                        <option value="Image" {{ $file->filetype == 'Image' ? 'selected' : '' }}>Image</option>
                        <option value="Audio" {{ $file->filetype == 'Audio' ? 'selected' : '' }}>Audio</option>
                        <option value="Video" {{ $file->filetype == 'Video' ? 'selected' : '' }}>Video</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="file" class="form-label">Upload New File</label>
                    <input type="file" id="file" name="file" class="form-control">
                </div>

                <div class="preview-container">
                    @if ($file->filetype == 'Image')
                    <div class="file-preview">
                        <p>Current Image:</p>
                        <img src="{{ $file->url }}" alt="Current Image" class="preview-image">
                    </div>
                    @elseif ($file->filetype == 'Audio')
                    <div class="file-preview">
                        <p>Current Audio:</p>
                        <audio controls class="preview-audio">
                            <source src="{{ $file->url }}" type="audio/mp3">
                            Your browser does not support the audio element.
                        </audio>
                    </div>
                    @elseif ($file->filetype == 'Video')
                    <div class="file-preview">
                        <p>Current Video:</p>
                        <video controls class="preview-video">
                            <source src="{{ $file->url }}" type="video/mp4">
                            Your browser does not support the video tag.
                        </video>
                    </div>
                    @endif
                </div>

                <button type="submit" class="btn btn-primary mt-2">Update</button>
            </form>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function () {
        $('#file').change(function () {
            var file = this.files[0];
            var fileType = $('#filetype').val();
            var previewContainer = $('.preview-container');

            previewContainer.empty();

            // Show preview based on file type
            if (fileType === 'Image') {
                var reader = new FileReader();
                reader.onload = function (e) {
                    $('<img>').attr('src', e.target.result).addClass('preview-image').appendTo(previewContainer);
                }
                reader.readAsDataURL(file);
            }  else if (fileType === 'Audio') {
                document.getElementById('audioSource').src = reader.result;
                document.getElementById('audioPreview').load();
                document.getElementById('previewImg').style.display = 'none';
                document.getElementById('videoPreview').style.display = 'none';
                document.getElementById('audioPreview').style.display = 'block';
            } else if (fileType === 'Video') {
                var reader = new FileReader();
                reader.onload = function (e) {
                    $('<video controls>').addClass('preview-video').append($('<source>').attr('src', e.target.result).attr('type', 'video/mp4')).appendTo(previewContainer);
                }
                reader.readAsDataURL(file);
            }
        });
    });
</script>
@endsection
