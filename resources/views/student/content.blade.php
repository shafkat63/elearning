
@extends('layout.stu_public') @section('content')
@section('nav') @include('layout.st_nav') @endsection

<div class="content-wrapper">
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-body">
          <h4 class="card-title"> {{ $name}}  </h4>
          <div class="d-flex justify-content-end" >
            <a href="{{ url('Learn') }}" class="link text-info p-2 text-decoration-none rounded">Subject ➡️ </a>
            <a href="{{ url('getPaperSL/' . $subjectName) }}" class="link text-info p-2 text-decoration-none rounded">{{ $subjectName }}</a>
       
            <a href="{{ url('/getChapterSL/'. $paperName) }}" class="link text-info p-2 text-decoration-none rounded">
              ➡️   </i> {{ $name}} 
          </a>   </div>

          <div class="row table-responsive">
         
            @foreach($contents as $content)
            <div class="card"> 

            </div>
            <div class="col-md-11">
                {{ $content->content_name }}
            </div>

            <form class="cmxform" id="dataFrom" method="#" action="#">
                @csrf
                <fieldset>
                  <div class="card-body table-responsive" id="contaent-details">
                    {!! $content->content_details !!}
                  </div>
    
                </fieldset>
              </form>
            @endforeach
          

        </div>
        
        </div>
      </div>
    </div>
  </div>
</div>


@endsection

