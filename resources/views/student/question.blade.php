@extends('layout.stu_public') @section('content')
<!-- partial:partials/_horizontal-navbar.html -->
@section('nav') @include('layout.st_nav') @endsection
<!-- partial -->
<style>
 
</style>
<div class="main-panel">
    <div class="card">
        <div class="card-body">
            @php 
            $i=1; 
            @endphp 
            @foreach($questions as $question)
  
            <h4 class="card-title mx-3">
                <span class="text-info">{{ $i++ }}.</span>
                {{$question->question_name}}
            </h4>
            @foreach($questionanswers as $questionanswer)
            @if($questionanswer->questions_id == $question->id)
            <div>
                
            </div>
            <blockquote class="blockquote border border-info opacity-75 mx-5 ">
               

                <input
                    type="radio"
                    name="{{$questionanswer->questions_id}}"
                    value=""
                    unchecked
                />
                <label for="{{$questionanswer->options}}" class="font-weight-thin"">
                    {{$questionanswer->options}}</label
                >
            </blockquote>
            @endif @endforeach @endforeach
        </div>

    </div>




    <!-- content-wrapper ends -->
    <!-- partial:../../partials/_footer.html -->

    <!-- partial -->
</div>
@endsection
