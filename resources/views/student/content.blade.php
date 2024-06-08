
@extends('layout.stu_public') @section('content')
@section('nav') @include('layout.st_nav') @endsection

<div class="content-wrapper">
  <div class="row">
    <div class="col-lg-12">
      <div class="card">
        <div class="card-body">
          <h4 class="card-title">   </h4>
          <div class="col-md-1">
            <a href="{{ url('/Learn') }}" class="btn btn-gradient-success btn-sm btn-icon-text mb-3">
                <i class="mdi mdi-arrow-left btn-icon-prepend"></i> Back
            </a>
        </div>
          <div class="row">
            @foreach($contents as $content)
            <div class="card"> 

            </div>
            <div class="col-md-11">
                {{ $content->content_name }}
            </div>

            <form class="cmxform" id="dataFrom" method="#" action="#">
                @csrf
                <fieldset>
                  <div class="card-body" id="contaent-details">
                    {!! $content->content_details !!}
                  </div>
    
                </fieldset>
              </form>
            @endforeach

        </div>
        
      
          <form class="cmxform" id="dataFrom" method="#" action="#">
            @csrf
            <fieldset>
              <div class="card-body" id="contaent-details">
              
              </div>

            </fieldset>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>


@endsection

