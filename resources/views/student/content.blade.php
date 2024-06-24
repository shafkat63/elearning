
@extends('layout.stu_public') @section('content')
@section('nav') @include('layout.st_nav') @endsection

<div class="content-wrapper">
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-body m-0 p-0">
          <h4 class="card-title"> {{ $name}}  </h4>
          <div class="d-flex justify-content-end" >
            <a href="{{ url('Learn') }}" class="link text-info p-2 text-decoration-none rounded">Subject ➡️ </a>
            <a href="{{ url('getPaperSL/' . $subjectName) }}" class="link text-info p-2 text-decoration-none rounded">{{ $subjectName }}</a>
       
            <a href="{{ url('/getChapterSL/'. $paperName) }}" class="link text-info p-2 text-decoration-none rounded">
              ➡️   </i> {{ $name}} 
          </a>   </div>

          <div class="row table-responsive m-0 p-0">
         
            @foreach($contents as $content)
            <div class="card m-0 p-0"> 

            </div>
            <div class="col-md-12 table-responsive">
                {{ $content->content_name }}
            </div>

            <form class="cmxform m-1 p-1" id="dataFrom" method="#" action="#">
                @csrf
                <fieldset>
                  <div class="card-body table-responsive m-1 p-1" id="contaent-details">
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

