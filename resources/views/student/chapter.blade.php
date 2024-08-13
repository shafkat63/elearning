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

    .icon-md {
        font-size: 2rem;
    }

    .main-panel, .content-wrapper {
        padding: 1rem;
    }

    @media (max-width: 768px) {
        .main-panel, .content-wrapper {
            padding: 0.5rem;
        }
    }
</style>

<div class="main-panel mt-5 mt-md-3 mt-lg-1">
    <div class="content-wrapper bg-white full-height">
        <div class="row">
            <div class="col-12" style="margin-left: 2em;">
                <h3 class="d-flex pt-3">
                    Select {{ $name }} Chapter
                </h3>
                <div class="mb-3">
                    <a href="{{ url('Learn') }}" class="link text-info p-2 text-decoration-none rounded">Subject ➡️</a>
                    <a href="{{ url('getPaperSL/' . $subjectName) }}" class="link text-info p-2 text-decoration-none rounded">
                        {{ $subjectName }} ➡️
                    </a> {{ $name }}
                </div>
            </div>
            <div class="col-12 m-1 p-1">
                <!-- Main Panel -->
                <div class="row justify-content-center">
                    @foreach($chapters as $data)
                        <div class="col-xl-3 col-lg-4 col-md-6 col-sm-12 mb-4">
                            <a href="{{ url('getcontentSL/' . $data->name) }}" 
                               class="card border-0 rounded-3 card-shadow bg-slate text-decoration-none card-fixed-height">
                                <div class="card-body p-0 d-flex flex-column justify-content-center text-center">
                                    <div class="banner-container d-flex justify-content-center align-items-center">
                                        <i class="mdi mdi-book-open-page-variant text-danger icon-md"></i>
                                    </div>
                                    <div class="text-container mt-2">
                                        <h5 class="font-weight-bold text-dark">
                                            {{ $data->name }}
                                        </h5>
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
