@extends('layout.stu_public') @section('content')
<!-- partial:partials/_horizontal-navbar.html -->
@section('nav') @include('layout.st_nav') @endsection
<!-- partial -->
<style></style>
<!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous"> -->

<div class="main-panel">
    <form action="/questionanswercheck" method="post">
        @csrf
        <div class="card">
            <div class="card-body">
                @php $i = 1; @endphp @if ($errors->has('answers'))
                <div class="alert alert-danger">
                    <strong>{{ $errors->first('answers') }}</strong>
                </div>
                @endif @forelse($questions as $question)
                <h4 class="card-title mx-3">
                    <span class="text-info">{{ $i++ }}.</span>
                    {{ $question->question_name }}
                </h4>

                @foreach($questionanswers as $questionanswer)
                @if($questionanswer->questions_id == $question->id)
                <blockquote
                    class="blockquote border border-info opacity-75 mx-5"
                >
                    <label
                        for="option{{$questionanswer->id}}"
                        class="d-block w-100"
                    >
                        <input
                            type="radio"
                            name="answers[{{$question->id}}]"
                            id="option{{$questionanswer->id}}"
                            value="{{$questionanswer->id}}"
                            class="me-2"
                            required
                        />
                        <span
                            class="font-weight-thin"
                            >{{$questionanswer->options}}</span
                        >
                    </label>
                </blockquote>
                @endif @endforeach @empty
                <p>No questions available.</p>
                @endforelse @if(!$questions->isEmpty())
                <div class="d-flex justify-content-end mt-4 pr-4">
                    <button type="submit" class="btn btn-primary btn-lg">
                        Submit
                    </button>
                </div>
                @endif
            </div>
        </div>
    </form>

    <!-- content-wrapper ends -->
    <!-- partial:../../partials/_footer.html -->
    <!-- partial -->
</div>
@endsection @section('script')
<script src="/assets/js/tex-mml-chtml.js"></script>
@endsection
