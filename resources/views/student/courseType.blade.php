@extends('layout.stu_public')

@section('content')
    @section('nav') 
        @include('layout.st_nav') 
    @endsection

    <style>
        .card-shadow {
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.15);
            border: none;
        }

        .full-height {
            height: 100%;
            width: 100%;
        }

        .test {
            margin-left: 2rem;
        }

        .card-fixed-height {
        height: 2in; /* Total height of the card */
    }

        .bg-slate {
            background-color: rgb(241, 245, 249);
        }

        .banner-container {
        height: 1.5in; /* Height for the image */
        overflow: hidden; /* Ensure the image doesn't overflow */
    }

        .banner-img {
        width: 100%;
        height: 100%;
        object-fit: cover; /* Ensure the image covers the container without distortion */
    }

        .flex-grow-1 {
            flex-grow: 1;
        }
        .text-container {
        height: 0.5in; /* Height for the text */
    }

        h3 {
            font-family: 'Roboto', sans-serif;
            font-weight: 700;
            color: #333;
        }

        .main-panel {
            padding: 1rem;
        }

        .card-body h5 {
            font-family: 'Roboto', sans-serif;
            font-weight: 500;
            color: #444;
        }

        .card:hover {
            transform: translateY(-5px);
            transition: transform 0.2s ease;
        }

        @media (max-width: 768px) {
            .main-panel, .content-wrapper {
                padding: 0.5rem;
            }
        }
    </style>

    <div class="main-panel mt-5 mt-lg-1">
        <div class="content-wrapper bg-white">
            <div class="row justify-content-center">
                <div class="col-12 mt-1 mb-3">
                    <h3 class="text-center ">Select Course Type</h3>
                </div>

                <div class="row justify-content-center">
                    @foreach ($courseTypes as $courseType)
                    <div class="col-xl-3 col-lg-4 col-md-6 col-sm-12 mb-4">
                        <a href="{{ url('getCoursesByCourseType/' . $courseType->name) }}"
                            class="card border-0 rounded-3 shadow-sm text-decoration-none card-fixed-height bg-slate card-shadow">
                            <div class="card-body p-0 d-flex flex-column">
                                <div class="banner-container">
                                    @if($courseType->thumbnail)
                                        <img src="{{ asset('storage/' . $courseType->thumbnail) }}" 
                                            alt="{{ $courseType->name }}" class="banner-img" loading='lazy'>
                                    @else
                                        <div class="text-center d-flex justify-content-center align-items-center h-100">
                                            <i class="mdi mdi-book-open-page-variant text-danger icon-md"></i>
                                        </div>
                                    @endif
                                </div>
                                <div class="p-2 text-center flex-grow-1 d-flex flex-column justify-content-center text-container">
                                    <h5>{{ $courseType->name }}</h5>
                                </div>
                            </div>
                        </a>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
@endsection
