@extends('layout.stu_public')

@section('content')
<!-- partial:partials/_horizontal-navbar.html -->
@section('nav') 
    @include('layout.st_nav') 
@endsection
<!-- partial -->

<style>
    .card-shadow {
        box-shadow: 0 8px 16px rgba(0, 0, 0, 0.15);
        border: none;
    }

    .bg-slate {
        background-color: rgb(241, 245, 249);
    }

    .card-fixed-height {
        height: 2in; /* Total height of the card */
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

    .text-container {
        height: 0.5in; /* Height for the text */
    }

    h3 {
        font-family: 'Roboto', sans-serif;
        font-weight: 700;
        color: #333;
    }

    .card-body h5 {
        font-family: 'Roboto', sans-serif;
        font-weight: 500;
        color: #444;
    }

    .card:hover {
        transform: translateY(-5px);
        box-shadow: 0 12px 24px rgba(0, 0, 0, 0.2);
        transition: all 0.3s ease;
    }

    .main-panel, .container-wrapper {
        padding: 1rem;
    }

    .mt-5, .mt-md-5, .mt-lg-1 {
        margin-top: 1rem;
    }

    @media (max-width: 768px) {
        .main-panel, .container-wrapper {
            padding: 0.5rem;
        }
    }

    .icon-md {
        font-size: 2rem;
    }
</style>

<div class="main-panel mt-5 mt-md-3 mt-lg-1">
    <div class="container-wrapper bg-white full-height">
        <div class="row">
            <div class="col-12 pt-1 pt-md-5 pt-lg-1 mb-3">
                <h3 class="text-center mt-5 mt-md-5 mt-lg-1">
                    Select {{ $name }} Paper
                </h3>
                <a href="\Learn" class="link text-info p-2 text-decoration-none rounded" style="margin-left: 2em;">
                    Subject ➡️ 
                </a>{{ $name }} Paper
            </div>
            <div class="col-12">
                <!-- Main Panel -->
                <div class="row justify-content-center">
                    @foreach($papers as $data)
                        <div class="col-xl-3 col-lg-4 col-md-6 col-sm-12 mb-4">
                            <a href="{{ url('getChapterSL/' . $data->name) }}" 
                               class="card border-0 rounded-3 card-shadow bg-slate text-decoration-none card-fixed-height">
                                <div class="card-body p-0 d-flex flex-column">
                                    <div class="banner-container">
                                        <div class="text-center d-flex justify-content-center align-items-center h-100">
                                            <i class="mdi mdi-book-open-page-variant text-danger icon-md"></i>
                                        </div>
                                    </div>
                                    <div class="p-2 text-center flex-grow-1 d-flex flex-column justify-content-center text-container">
                                        <h5 class="font-weight-bold text-dark">
                                            {{ $data->name }}
                                        </h5>
                                    </div>
                                    <div class="text-center mt-3">
                                        <!-- Additional content or buttons can be added here if needed -->
                                    </div>
                                </div>
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
