@extends('layout.stu_public')
@section('content')
<!-- partial:partials/_horizontal-navbar.html -->
@section('nav')
@include('layout.st_nav')
@endsection
<!-- partial -->

<style>
  .profile-card {
    background-color: #fff;
    border: 1px solid #e0e0e0;
    border-radius: 8px;
    box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2); /* Increased shadow for better visibility */
    padding: 20px;
    margin: 20px auto; /* Center the card horizontally */
    width: 75%; /* Card takes 75% of the width */
  }

  .profile-header {
    text-align: center;
    padding-bottom: 20px;
    border-bottom: 1px solid #e0e0e0;
    position: relative; /* Make sure the position of the edit button is relative to this container */
  }

  .profile-header img {
    border-radius: 50%;
    width: 120px;
    height: 120px;
  }

  .profile-header h3 {
    margin-top: 10px;
    margin-bottom: 5px;
  }

  .profile-header p {
    margin-bottom: 0;
    color: #6c757d;
  }

  .profile-info {
    padding-top: 20px;
  }

  .profile-info .info-item {
    display: flex;
    justify-content: space-between;
    padding: 10px 0;
    border-bottom: 1px solid #e0e0e0;
  }

  .profile-info .info-item:last-child {
    border-bottom: none;
  }

  .profile-info .info-item span {
    font-weight: 600;
  }

  .profile-info .info-item .text-muted {
    color: #6c757d;
  }

  .avatar-small {
    width: 80px;
    height: 80px;
    object-fit: cover;
  }

  .btn-icon {
    font-size: 1.2rem;
    vertical-align: middle;
  }

  .btn-primary {
    padding: 0.5rem;
    border-radius: 50%;
  }
</style>

<div class="main-panel">
  <div class="content-wrapper">
    <div class="row justify-content-center">
      <div class="col-lg-12">
        <div class="card profile-card">
          <div class="card-body">
            <div class="profile-header">
              <div class="position-relative d-inline-block mb-3">
                <img src="{{ auth()->user()->avatar ? asset('storage/' . auth()->user()->avatar) : asset('assets/images/faces/face12.jpg') }}"
                    alt="{{ auth()->user()->name }}"
                    class="rounded-circle img-fluid avatar-small" />
                <!-- Edit button with icon -->
                <a href="{{ route('editProfileST', ['id' => auth()->user()->id]) }}" class="btn btn-primary position-absolute"
                  style="bottom: 0; right: 0; transform: translate(50%, 50%);">
                  <i class="mdi mdi-pencil btn-icon"></i>
                </a>
              </div>
              <h3>{{ auth()->user()->name }}</h3>
              <p>User Role:
                @if(auth()->check())
                @foreach(auth()->user()->roles as $role)
                <span class="badge bg-primary">{{ $role->name }}</span>
                @endforeach
                @endif
              </p>
            </div>
            <div class="profile-info">
              <div class="info-item">
                <span>Status</span>
                <span class="text-success">Active</span>
              </div>
              <div class="info-item">
                <span>Phone</span>
                <span>{{ auth()->user()->phone }}</span>
              </div>
              <div class="info-item">
                <span>Mail</span>
                <span class="text-muted">{{ auth()->user()->email }}</span>
              </div>
              <div class="info-item">
                <span>Login ID</span>
                <span class="text-muted">{{ auth()->user()->email }}</span>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- content-wrapper ends -->
@endsection

@section('script')
@endsection
