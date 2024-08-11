@extends('layout.stu_public') @section('content')


<!-- partial:partials/_horizontal-navbar.html -->
@section('nav') @include('layout.st_nav') @endsection

<style>
    .card-shadow {
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        border: 1px solid gray;
    }
    .full-height {
        height: 100%;
        width: 100%; /* 100% of the viewport height */
    }
    .test {
        margin-left: 2rem;
    }
    .bg-slate{
        background-color: rgb(241, 245, 249);
    }
    .content-wrapper {
        padding-top: 60px; /* Adjust this value based on your navbar height */
    }
</style>



<div class="main-panel m-1 p-1 mt-5  mt-lg-1">
    <div class="content-wrapper bg-white m-1 p-1">
        <div class="row m-3 p-1">
            <div class="col-12 mt-1 mt-md-5 mt-lg-1">
                <h3 class="col-12 m-1 p-1 pb-3 mt-1 mt-md-5 mt-lg-1 ">Select Course</h3>
            </div>
            
            <div class="col-12 m-1 p-1">
                <!-- Main Panel -->
                <div class="card bg-white m-0 p-0">
                    <div class="card-body m-0 p-0">
                        <div class="row justify-content-center m-0 p-0">
                           {{-- //foreach --}}
                           @foreach ($courses as $course)
                            <div class="col-xl-3 col-lg-4 col-md-6 col-sm-12 mb-4">
                                <a href="{{url ('getCoursesS/'.$course->name) }}" class="card border-0 bg-slate rounded-3 shadow-sm" 
                                            style="text-decoration: none;">
                                    <div class="card-body">
                                        <div class="text-center mb-3">
                                            <i class="mdi mdi-book-open-page-variant text-danger icon-md"></i>
                                        </div>
                                        <div class="text-center">
                                            <h5 class="font-weight-bold text-dark">{{$course->name}}</h5>
                                        </div>
                                        <div class="text-center mt-3">
                                        {{-- <a href="{{url ('getCoursesS/'.$course->name) }}" class="btn btn-dark btn-sm">Enter</a> --}}

                                        </div>
                                    </div>
                                </a>
                            </div>
                           {{-- //endforeach --}}
                           @endforeach
                        </div>
                    </div>
                </div>
                <!-- End Main Panel -->
            </div>
        </div>
    </div>
    <!-- content-wrapper ends -->
</div>


@endsection @section('script')

@endsection