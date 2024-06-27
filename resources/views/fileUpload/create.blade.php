@extends('layout.app') @section('title', 'Subject Info') @section('mainNav')
@include('layout.nav') @endsection @section('mainContent')

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
        max-width: 60%;
    }
</style>
<div class="container">
    <div class="table-responsive form-container">
        @if ($message = Session::get('success'))
        <div class="alert alert-success">
            {{ $message }}
        </div>
        @endif
        <h2 class="form-heading">Upload Files</h2>
        <form
            class="cmxform w-80"
            action="{{ route('Files.store') }}"
            method="POST"
            enctype="multipart/form-data"
        >
            @csrf
            <label for="name" class="form-label fw-bold">Name</label>
            <input type="text" class="form-control" name="name" />
            <br />
            <select class="form-select mt-1" name="type">
                <option value="">Select Media Type</option>
                <option value="Image">Image</option>
                <option value="Audio">Audio</option>
                <option value="Video">Video</option>
            </select>
            <br />
            <input type="file" class="form-control" name="file" />
            <button
                type="submit"
                class="btn btn-primary w-10 d-flex justify-contain-center"
            >
                Upload
            </button>
        </form>
    </div>
</div>
@endsection
