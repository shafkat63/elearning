@extends('layout.stu_public') @section('content') @section('nav')
@include('layout.st_nav') @endsection
<style>
    .correct-answer {
        font-weight: bold;
        background-color: #74e08d;
        font-style: italic;
    }

    .incorrect-answer {
        font-weight: bold;
        background-color: #f19275e8;
        font-style: italic;
    }

    .solution-answer {
        font-weight: bold;
        background-color: #b0f5f5e8;
        font-style: italic;
    }

    .custom-valid {
        margin-top: 1%;
    }

    .custom-radio {
        appearance: none;
        -webkit-appearance: none;
        -moz-appearance: none;
        width: 18px;
        height: 18px;
        border: 2px solid #1478db;
        /* Border color */
        border-radius: 50%;
        /* Make it round */
        display: inline-block;
        position: relative;
        vertical-align: middle;
        cursor: pointer;
        margin-right: 8px;
        /* Spacing between radio button and label */
    }
</style>
<div class="main-panel">
    <div action="/questionanswercheck" method="post">
        @csrf

        <div class="card">
            <div class="card-body">
                @php $i = 1; @endphp @if ($errors->has('answers'))
                <div class="alert alert-danger">
                    <strong>{{ $errors->first('answers') }}</strong>
                </div>
                @endif @forelse($exam_data as $question)
                <h4 class="card-title mx-3">
                    <span class="text-info">{{ $i++ }}.</span>
                    {{ $question->question_name }}
                </h4>

                @foreach($questionanswers as $questionanswer)
                @if($questionanswer->questions_id == $question->qus_id) @php
                $bgColorClass = ''; if($question->answer_id ==
                $questionanswer->id) { if($question->solution_id ==
                $questionanswer->id) { $bgColorClass = 'correct-answer '; } else
                { $bgColorClass = 'incorrect-answer'; } } else {
                if($question->solution_id == $questionanswer->id) {
                $bgColorClass = 'solution-answer'; } } @endphp

                <blockquote class="blockquote border border-info opacity-75 mx-5 {{
                        $bgColorClass
                    }}">
                    <label for="option{{$questionanswer->id}}" class="d-block w-100">

                        <span class="font-weight-thin">{{$questionanswer->options}}</span>
                    </label>

                    @if($question->answer_id == $questionanswer->id)
                    @if($question->solution_id == $questionanswer->id)
                    <p class="custom-valid">Correct</p>
                    @else
                    <p class="custom-valid">Incorrect</p>
                    @endif @else @if($question->solution_id ==
                    $questionanswer->id)
                    <p class="custom-valid">Solution</p>
                    @endif @endif
                </blockquote>
                @endif @endforeach @empty
                <p>No questions available.</p>
                @endforelse
            </div>
        </div>
    </div>
</div>

@endsection @section('script')
<script src="/assets/js/tex-mml-chtml.js"></script>
@endsection