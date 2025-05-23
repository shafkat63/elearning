@extends('layout.app')
@section('title', 'Subject Edit')

@section('mainNav')
@include('layout.nav')
@endsection

<link href="https://cdnjs.cloudflare.com/ajax/libs/prism/1.29.0/themes/prism-okaidia.min.css" rel="stylesheet" />

@section('mainContent')
<div class="content-wrapper m-0 p-0 pt-2 p-lg-3">
  <div class="row m-0 m-md-0 m-lg-1">
    <div class="col-lg-12">
      <div class="card">
        <div class="card-body p-2 p-sm-2 p-md-2 p-lg-4">
          <h4 class="card-title">
            <div class="row">
                <div class="col-md-11 mb-2">
                  {{$content->content_name}}
                </div>
                <div class="col-md-1">
                <a href="{{url('Content')}}" class="btn btn-gradient-success btn-sm btn-icon-text">
                    <i class="mdi mdi-arrow-left btn-icon-prepend"></i> Back </a>
                </div>
            </div>
          </h4>
          <div class="table-responsive">
          <form class="cmxform" id="dataFrom" method="POST" action="{{ url('content/update', $content->id) }}">
            @csrf
            @method('PUT')
            <fieldset>
              <div class="card-body" id="content-details">
                {!! $content->content_details !!}
              </div>
            </fieldset>
          </form>
        </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection

@section('script')
<script src="{{ asset('assets/js/sweetalert.min.js') }}"></script>
<script src="{{ asset('assets/js/custom.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/tinymce/7.0.1/tinymce.min.js" referrerpolicy="origin"></script>
<script src="{{ asset('assets/js/tex-mml-chtml.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/prism/1.29.0/prism.min.js"></script>

<script>
  $("#btnSubmit").on("click", function () { 
    SaveData("{{ url('Content') }}" , $("#dataFrom").serialize());
  });
</script>
@endsection
