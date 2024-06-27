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
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    padding: 20px;
  }
  .profile-header {
    text-align: center;
    padding-bottom: 20px;
    border-bottom: 1px solid #e0e0e0;
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
</style>
<div class="main-panel">
  <div class="content-wrapper">
    <div class="row justify-content-center">
      <div class="col-lg-8">
        <div class="card profile-card">
          <div class="card-body">
            <div class="profile-header">
              <img src="../../../assets/images/faces/face12.jpg" alt="profile" />
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
