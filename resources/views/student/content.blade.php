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

  .pagination {
    display: flex;
    justify-content: center;
    padding: 1rem 0;
    list-style: none;
    border-radius: 0.25rem;
  }

  .pagination li {
    margin: 0 0.25rem;
  }

  .pagination a,
  .pagination span {
    display: inline-block;
    padding: 0.5rem 1rem;
    font-size: 0.875rem;
    font-weight: 500;
    color: #007bff;
    text-decoration: none;
    border: 1px solid #dee2e6;
    border-radius: 0.25rem;
  }

  .pagination a:hover,
  .pagination span.active {
    background-color: #007bff;
    color: #fff;
    border-color: #007bff;
  }

  .pagination .disabled {
    color: #6c757d;
    pointer-events: none;
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
            <a href="{{ url('getPaperSL/' . $subjectName) }}" class="link text-info p-2 text-decoration-none rounded">{{
              $subjectName }}</a>
            <a href="{{ url('/getChapterSL/'. $paperName) }}" class="link text-info p-2 text-decoration-none rounded">➡️
              {{ $name }}</a>
          </div>

          <div class="content-wrapper m-0 p-0 custom">
            @if($contents->count() > 0)
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
            @else
            <p>No content available.</p>
            @endif
          </div>

          <!-- Pagination Links -->


        </div>
      </div>


    </div>
    <div class="">
      {{ $contents->links('vendor.pagination.custom') }}
    </div>
  </div>

</div>

@endsection

@section('script')
<script src="{{ asset('assets/js/tex-mml-chtml.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/tinymce/7.0.1/tinymce.min.js" referrerpolicy="origin"></script>

@endsection