@extends('layout.app')
@section('title', 'Question Info')
@section('style')


<script src="https://cdn.ckeditor.com/ckeditor5/34.1.0/classic/ckeditor.js"></script>
@endsection
@section('mainNav')
@include('layout.nav')
@endsection

@section('mainContent')
<div class="content-wrapper">
  <div class="row">
    <div class="col-lg-12 grid-margin stretch-card">
      <div class="card">
        <div class="card-body">
            <h4 class="card-title">
                <div class="row">
                    <div class="col-md-10">
                      Options Info  
                    </div>
                    <div class="col-md-2">
                      <a href="{{url('Question')}}" class="btn btn-gradient-success btn-sm btn-icon-text">
                        <i class="mdi mdi-arrow-left btn-icon-prepend"></i> Back </a>
                    </div>
                </div>
            </h4> 

            <div class="card-body">
              <h4 class="card-title">{{$questionOptions[0]->question_name}}</h4>
              </p>
              @foreach ($questionOptions as $item)
              
              <div class="row">
                <div class=" d-flex align-items-center justify-content-center">

                    <input type="radio" class="col-md-1 form-check-input" style="margin: 0 10px 0 25px" {{$item->optionanser == 1 ? 'checked' : ''}} disabled>
                    <blockquote class="col-md-11 blockquote 
                      @if( $item->optionanser==1)
                      blockquote-success
                      @endif
                      ">
                      <p class="mb-0">{{ $item->options}}</p>
                  </blockquote>
                </div>
              </div>
              @endforeach  
            </div>
            
        </div>
      </div>
    </div>
  </div>
  

</div>


@endsection

@section('script')
<script>


  $('#dataTableItem').DataTable();

</script>

@endsection