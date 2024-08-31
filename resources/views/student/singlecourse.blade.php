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
            {{-- <a href="{{ url('getPaperSL/' . $subjectName) }}"
              class="link text-info p-2 text-decoration-none rounded">{{ --}}
              {{-- $subjectName }}</a> --}}
            {{-- <a href="{{ url('/getChapterSL/'. $paperName) }}"
              class="link text-info p-2 text-decoration-none rounded">➡️ --}}
              {{-- {{ $name }}</a> --}}
          </div>

          <div class="container m-0 p-0 custom">
            <p class="mb-4"><strong>Name: </strong>{{$course->name}}</p>


            <div class="row mb-4">
              <div class="col-md-6">
                <p class="mb-4">
                <div>This is an example of a cursive font.</div>

                <strong>Course Overview:</strong> {!!$course->description!!}
                </p>
              </div>
              <div class="col-md-6">
                <img src="{{ asset('storage/' . $course->thumbnail) }}" alt="{{ $course->name }}"
                  class="img-fluid banner-img" loading="lazy" width="100%" height="400px">
              </div>

            </div>
            <div class="col-md-6">
              <p><strong>Course Curriculum:</strong> {!!$course->content!!}</p>
            </div>
            <p class="mb-4"><strong>Created By:</strong> {{$creator}}</p>
          </div>


        </div>
      </div>
    </div>
  </div>
</div>



@endsection