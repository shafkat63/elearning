@extends('layout.stu_public')

@section('content')
<!-- partial:partials/_horizontal-navbar.html -->
@section('nav') 
    @include('layout.st_nav') 
@endsection
<!-- partial -->
<style>
    .fail-container {
        height: 100vh;
        display: flex;
        justify-content: center;
        align-items: center;
        background-color: #f8f9fa;
    }

    .fail-box {
        text-align: center;
        background: #fff;
        padding: 40px;
        border-radius: 8px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    .fail-icon {
        font-size: 3rem;
        color: #dc3545; /* Bootstrap's danger color */
    }

    .btn-danger {
        background-color: #dc3545;
        border: none;
    }

    .btn-danger:hover {
        background-color: #c82333;
    }
</style>

<div class="fail-container">
    <div class="fail-box">
        <div class="fail-icon">
            <i class="mdi mdi-alert-circle text-danger"></i>
        </div>
        <h1 class="display-4">Payment Failed</h1>
        <p class="lead">We’re sorry, but your payment could not be processed. Please try again or contact support for assistance.</p>
        <a href="/Contact" class="btn btn-danger btn-lg">Contact Support</a>
    </div>
</div>
@endsection
