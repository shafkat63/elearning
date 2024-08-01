@extends('layout.app') @section('title', 'Paper Info') @section('mainNav')
@include('layout.nav') @endsection
<style>
    .bg-custom {
        background-color: rgb(64, 199, 132);
    }
</style>
@section('mainContent')
    <!-- Add Bootstrap 4 CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">

    <div class="content-wrapper m-0 p-0 pt-2 p-lg-3">
        <h1 class="mb-4">Courses</h1>
        <table class="table table-bordered table-striped">
            <thead class="thead-dark">
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Category</th>
                    <th>Course</th>
                    <th>Instruction</th>
                    <th>Content</th>
                    <th>Description</th>
                    <th>Thumble</th>
                    <th>Status</th>
                    <th>Create By</th>
                    <th>Create Date</th>
                    <th>Update By</th>
                    <th>Update Date</th>
                </tr>
            </thead>
            <tbody>
                @foreach($courses as $course)
                    <tr>
                        <td>{{ $course->id }}</td>
                        <td>{{ $course->name }}</td>
                        <td>{{ $course->category }}</td>
                        <td>{{ $course->course }}</td>
                        <td>{{ $course->instruction }}</td>
                        <td>{{ $course->content }}</td>
                        <td>{{ $course->description }}</td>
                        <td>{{ $course->thumble }}</td>
                        <td class="{{ $course->status == 'active' ? 'text-success' : 'text-danger' }}">
                            {{ $course->status }}
                        </td>
                        <td>{{ $course->create_by }}</td>
                        <td>{{ $course->create_date }}</td>
                        <td>{{ $course->update_by }}</td>
                        <td>{{ $course->update_date }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- Add Bootstrap 4 JS (optional) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
@endsection
