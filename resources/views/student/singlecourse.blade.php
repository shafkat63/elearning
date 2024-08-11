@extends('layout.stu_public')
@section('content')
@section('nav')
@include('layout.st_nav')
@endsection




<div class="content-wrapper">
    <div class="container">
      <div class="col-12">
        <div class="card">
          <div class="card-body m-5 p-0">
            {{-- <h4 class="card-title">{{ $name }}</h4> --}}
            <div class="d-flex justify-content-end">
              <a href="{{ url('getCoursesTypeS') }}" class="link text-info p-2 text-decoration-none rounded">Course ➡️</a>
              {{-- <a href="{{ url('getPaperSL/' . $subjectName) }}" class="link text-info p-2 text-decoration-none rounded">{{ --}}
                {{-- $subjectName }}</a> --}}
              {{-- <a href="{{ url('/getChapterSL/'. $paperName) }}" class="link text-info p-2 text-decoration-none rounded">➡️ --}}
                {{-- {{ $name }}</a> --}}
            </div>
  
            <div class="table-responsive m-0 p-0 custom">
                <p class="mb-4"><strong>Name: </strong>{{$course->name}}</p>
                <p class="mb-4"><strong>Content:</strong> {!!$course->content!!}</p>
                <p class="mb-4"><strong>Created By:</strong> {{$creator}}</p>
                <p class="mb-4"><strong>Status:</strong> {{$course->status}}</p>
                <p class="mb-4"><strong>Description:</strong> {!!$course->description!!}</p>
                <p class="mb-4"><strong>coursetype:</strong> {{$coursetype}}</p>
            </div>
  
          </div>
        </div>
      </div>
    </div>
  </div>



@endsection