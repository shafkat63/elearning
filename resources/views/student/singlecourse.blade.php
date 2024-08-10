@extends('layout.stu_public')
@section('content')
@section('nav')
@include('layout.st_nav')
@endsection


<div class="container d-flex flex-column justify-content-center align-items-center" style="height: 100vh;">
    <div class="text-center">
        <p class="mb-4"><strong>Name: </strong>{{$course->name}}</p>
        <p class="mb-4"><strong>Content:</strong> {!!$course->content!!}</p>
        <p class="mb-4"><strong>Created By:</strong> {{$creator}}</p>
        <p class="mb-4"><strong>Status:</strong> {{$course->status}}</p>
        <p class="mb-4"><strong>Description:</strong> {!!$course->description!!}</p>
        <p class="mb-4"><strong>coursetype:</strong> {{$coursetype}}</p>
    </div>
</div>
@endsection