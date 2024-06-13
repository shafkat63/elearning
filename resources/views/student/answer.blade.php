@extends('layout.stu_public') @section('content')
<!-- partial:partials/_horizontal-navbar.html -->
@section('nav') @include('layout.st_nav') @endsection


<div class="container">
    <h1 class="my-4">Answers</h1>
    
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <table class="table table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Student ID</th>
                <th>Status</th>
                <th>Question ID</th>
                <th>Answer ID</th>
                <th>Solution ID</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($answers as $answer)
            <tr>
                <td>{{ $answer->id }}</td>
                <td>{{ $answer->student_id }}</td>
                <td>{{ $answer->status }}</td>
                <td>{{ $answer->question_id }}</td>
                <td>{{ $answer->answer_id }}</td>
                <td>{{ $answer->solution_id }}</td>
                <td>
                   
                    <form action="" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
