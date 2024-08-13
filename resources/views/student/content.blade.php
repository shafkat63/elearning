@extends('layout.stu_public')

@section('content')

@section('nav')
@include('layout.st_nav')
@endsection

@push('styles')
<style>
  .custom {
    width: 90%;
    margin: 0 auto;
  }

  /* Adjust width for tablets */
  @media (max-width: 992px) {
    .custom {
      width: 95%;
    }
  }

  /* Adjust width for mobile phones */
  @media (max-width: 768px) {
    .custom {
      width: 100%;
      padding: 0 15px;
    }
  }
</style>
@endpush

<div class="content-wrapper">
  <div class="container">
    <div class="col-12">
      <div class="card">
        <div class="card-body m-5 p-0">
          <h4 class="card-title">{{ $name }}</h4>
          <div class="d-flex justify-content-end">
            <a href="{{ url('Learn') }}" class="link text-info p-2 text-decoration-none rounded">Subject ➡️</a>
            <a href="{{ url('getPaperSL/' . $subjectName) }}" class="link text-info p-2 text-decoration-none rounded">{{ $subjectName }}</a>
            <a href="{{ url('/getChapterSL/'. $paperName) }}" class="link text-info p-2 text-decoration-none rounded">➡️ {{ $name }}</a>
          </div>

          <div class="table-responsive m-0 p-0 custom">
            @foreach($contents as $content)
            <div class="card m-0 p-0">
              <div class="col-md-12">
                <div class="card-body table-responsive m-1 p-1" id="content-details">
                  <h5 class="card-title">{{ $content->content_name }}</h5>
                  {!! $content->content_details !!}
                </div>
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
