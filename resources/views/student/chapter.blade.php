@extends('layout.stu_public') @section('content')
<!-- partial:partials/_horizontal-navbar.html -->
@section('nav') @include('layout.st_nav') @endsection
<!-- partial -->
<style>
    .card-shadow {
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        border: 1px solid gray;
    }
    .bg-slate{
        background-color: rgb(241 245 249);

    }
</style>
<div class="main-panel mt-5 mt-md-3 mt-lg-1">
    <div class="content-wrapper bg-white full-height">
        <div class="row">
            <div class="col-12" style="margin-left: 2em;">
                <h3 class="d-flex  pt-3">
                 Select  {{ $name}} Chapter

                </h3>
                <div >
                    <a href="{{ url('Learn') }}" class="link text-info p-2 text-decoration-none rounded">Subject ➡️ </a>
                    <a href="{{ url('getPaperSL/' . $subjectName) }}" class="link text-info p-2 text-decoration-none rounded"> {{ $subjectName }}  ➡️  </a> {{ $name}}
                </div>

            </div>
            <div class="col-12 m-1 p-1">
                <!-- Main Panel -->
                <div class="card bg-white m-0 p-0">
                    <div class="card-body m-1 p-1">
                        <div class="row justify-content-center m-1 p-1">
                            @foreach($chapters as $data)
                            <div
                                class="col-xl-3 col-lg-4 col-md-6 col-sm-12 mb-4 m-1 p-1"
                                id="paperForm"
                            >
                                <div class="card border-0 rounded-3 shadow-sm ">
                                    <div class="card-body bg-slate">
                                        <div class="text-center mb-3">
                                            <i
                                                class="mdi mdi-book-open-page-variant text-danger icon-md"
                                            ></i>
                                        </div>
                                        <div class="text-center">
                                            <h5
                                                class="font-weight-bold text-dark"
                                            >
                                                {{$data->name}}
                                            </h5>
                                        </div>
                                        <div class="text-center mt-3">
                                            <a
                                                href="{{ url('getcontentSL/' . $data->name) }}"
                                                class="btn btn-dark btn-sm"
                                            >
                                                Enter</a
                                            >
                                        </div>
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
</div>

@endsection
