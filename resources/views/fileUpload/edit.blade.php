

@extends('layout.app')
@section('title', 'Edit File')
@section('mainNav')
@include('layout.nav')
@endsection

@section('mainContent')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Edit File</h4>
                    @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
                    <form action="{{ route('Files.update', $file->id) }}" method="POST">
                        @csrf
                        @method('PATCH')
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" name="name" class="form-control" value="{{ $file->name }}" required>
                        </div>
                        <div class="form-group">
                            <label for="filetype">File Type</label>
                            <select name="filetype" class="form-control" required>
                                <option value="Image" {{ $file->filetype == 'Image' ? 'selected' : '' }}>Image</option>
                                <option value="Audio" {{ $file->filetype == 'Audio' ? 'selected' : '' }}>Audio</option>
                                <option value="Video" {{ $file->filetype == 'Video' ? 'selected' : '' }}>Video</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
