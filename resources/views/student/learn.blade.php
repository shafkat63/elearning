@extends('layout.stu_public')

@section('content')

@section('nav') 
    @include('layout.st_nav') 
@endsection

<style>
    /* Modern card shadow */
    .card-shadow {
        box-shadow: 0 8px 16px rgba(0, 0, 0, 0.15);
        border: none;
    }

    /* Fixed height for cards */
    .card-fixed-height {
        height: 2in; /* Total height of the card */
    }

    /* Background color for cards */
    .bg-slate {
        background-color: rgb(241, 245, 249);
    }

    /* Image container and styling */
    .banner-container {
        height: 1.5in; /* Height for the image */
        overflow: hidden; /* Ensure the image doesn't overflow */
    }

    .banner-img {
        width: 100%;
        height: 100%;
        object-fit: cover; /* Ensure the image covers the container without distortion */
    }

    /* Text container styling */
    .text-container {
        height: 0.5in; /* Height for the text */
    }

    /* Font and spacing */
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

    /* Card hover effect */
    .card:hover {
        transform: translateY(-5px);
        box-shadow: 0 12px 24px rgba(0, 0, 0, 0.2);
        transition: all 0.3s ease;
    }

    /* Padding and spacing */
    .main-panel, .content-wrapper {
        padding: 1rem;
    }

    /* Responsive adjustments */
    @media (max-width: 768px) {
        .main-panel, .content-wrapper {
            padding: 0.5rem;
        }
    }

    /* Icon styling */
    .icon-md {
        font-size: 2rem;
    }
</style>

<div class="main-panel mt-5 mt-lg-1">
    <div class="content-wrapper bg-white">
        <div class="row justify-content-center">
            <div class="col-12 mt-1 mb-3">
                <h3 class="text-center">Select Subject</h3>
            </div>

            <div class="row justify-content-center">
                @foreach($subjects as $data)
                    <div class="col-xl-3 col-lg-4 col-md-6 col-sm-12 mb-4">
                        <a href="{{ url('getPaperSL/' . $data->name) }}" 
                           class="card border-0 rounded-3 card-shadow text-decoration-none card-fixed-height bg-slate">
                            <div class="card-body p-0 d-flex flex-column">
                                <div class="banner-container">
                                    <div class="text-center d-flex justify-content-center align-items-center h-100">
                                        <i class="mdi mdi-book-open-page-variant text-danger icon-md"></i>
                                    </div>
                                </div>
                                <div class="p-2 text-center flex-grow-1 d-flex flex-column justify-content-center text-container">
                                    <h5>{{ $data->name }}</h5>
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
