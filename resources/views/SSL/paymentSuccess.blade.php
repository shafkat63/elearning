@extends('layout.stu_public')

@section('content')
<!-- partial:partials/_horizontal-navbar.html -->
@section('nav') 
    @include('layout.st_nav') 
@endsection
<!-- partial -->
<style>
    .success-container {
        height: 100vh;
        display: flex;
        justify-content: center;
        align-items: center;
        background-color: #f8f9fa;
    }

    .success-box {
        text-align: center;
        background: #fff;
        padding: 40px;
        border-radius: 8px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    .success-icon {
        font-size: 3rem;
        color: #28a745;
    }

    .btn-primary {
        background-color: #007bff;
        border: none;
    }

    .btn-primary:hover {
        background-color: #0056b3;
    }
</style>

<div class="success-container">
    <div class="success-box">
        <div class="success-icon">
            <i class="mdi mdi-checkbox-multiple-marked-circle text-success"></i>
        </div>
        <h1 class="display-4">Payment Successful</h1>
        <p class="lead">Thank you for your payment. Your transaction has been completed securely with SSL encryption.</p>
        <a href="/Home" class="btn btn-primary btn-lg">Return to Home</a>
    </div>
</div>
@endsection
