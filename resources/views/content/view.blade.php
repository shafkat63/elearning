@extends('layout.app')
@section('title', 'Subject Edit')
@section('mainNav')
@include('layout.nav')
@endsection

@section('mainContent')
<div class="content-wrapper">
  <div class="row">
    <div class="col-lg-12">
      <div class="card">
        <div class="card-body">
          <h4 class="card-title">
            <div class="row">
                <div class="col-md-11">
                  {{$content->content_name}}
                </div>
                <div class="col-md-1">
                <a href="{{url('Content')}}" class="btn btn-gradient-success btn-sm btn-icon-text">
                    <i class="mdi mdi-arrow-left btn-icon-prepend"></i> Back </a>
                </div>
            </div>
          </h4>
          <div class="table-responsive ">
          <form class="cmxform" id="dataFrom" method="#" action="#">
            @csrf
            <fieldset>
              <div class="card-body" id="contaent-details">
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

<script>
  $("#btnSubmit").on("click", function () { SaveData("{{ url('Content') }}" , $("#dataFrom").serialize());});

</script>
@endsection

@section('script')
<script src="{{ asset('assets/js/tex-mml-chtml.js') }}"></script> @endsection
