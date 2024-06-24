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
<div class="main-panel m-1 p-1 mt-5 mt-md-3 mt-lg-1">
    <div class="container-wrapper bg-white full-height">
        <div class="row">
            <div class="col-12 pt-1 pt-md-5 pt-lg-1">
                <h3 class=" mt-5 mt-md-5 mt-lg-1" style="margin-left: 2em;">
                 Select   {{ $name}} Paper
                </h3>
                <a href="\Learn" class="link text-info p-2 text-decoration-none  rounded " style=" margin-left: 4em;">Subject ➡️ </a>{{ $name}} Paper

            </div>
            <div class="col-12">
                <!-- Main Panel -->
                <div class="card bg-white">
                    <div class="card-body">
                        <div class="row justify-content-center">
                            @foreach($papers as $data)
                            <div
                                class="col-xl-3 col-lg-4 col-md-6 col-sm-12 mb-4"
                                id="paperForm"
                            >
                                <div class="card border-0 rounded-3 shadow-sm">
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
                                                href="{{ url('getChapterSL/'.$data->name) }}"
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
