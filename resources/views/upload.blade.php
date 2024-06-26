@extends('layout.app') @section('title', 'Subject Info') @section('mainNav')
@include('layout.nav') @endsection @section('mainContent')
<div>
    <form class="cmxform" 
        action="{{ route('upload.store') }}"
        method="POST"
        enctype="multipart/form-data"
    >
        @csrf
        <label for="name">Name</label>
        <input type="text" class="form-control" name="name" />
        <br />
        <select name="type">
            <option value="">Select Media Type</option>
            <option value="Image">Image</option>
            <option value="Audio">Audio</option>
            <option value="Video">Video</option>
        </select>
        <br />
        <input type="file" name="file" />
        <button type="submit">Upload</button>
    </form>
</div>
@endsection
