@extends('layout.app')
@section('title', 'User Info')
@section('mainNav')
@include('layout.nav')
@endsection

@section('mainContent')
<div class="content-wrapper">
  <div class="row">
    <div class="col-lg-12">
      <div class="card">
        <div class="card-body">
          <h4 class="card-title">Complete form validation</h4>
          <form class="cmxform" id="signupForm" method="get" action="#">
            <fieldset>
              <div class="form-group">
                <label for="firstname">Firstname</label>
                <input id="firstname" class="form-control" name="firstname" type="text">
              </div>
              <div class="form-group">
                <label for="lastname">Lastname</label>
                <input id="lastname" class="form-control" name="lastname" type="text">
              </div>
              <div class="form-group">
                <label for="username">Username</label>
                <input id="username" class="form-control" name="username" type="text">
              </div>
              
              <div class="form-group">
                <label for="password">Password</label>
                <input id="password" class="form-control" name="password" type="password">
              </div>
              <div class="form-group">
                <label for="confirm_password">Confirm password</label>
                <input id="confirm_password" class="form-control" name="confirm_password" type="password">
              </div>
              <div class="form-group">
                <label for="email">Email</label>
                <input id="email" class="form-control" name="email" type="email">
              </div>
              <input class="btn btn-primary" type="submit" value="Submit">
              <button onclick="showModal()" class="btn btn-info" type="button" data-bs-toggle="modal" data-bs-target="#exampleModal-4">Show Modal</button>
            </fieldset>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="exampleModal-4" tabindex="-1" role="dialog" aria-labelledby="ModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-fullscreen-md-down" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="ModalLabel">New message</h5>
        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form class="cmxform" id="signupForm" method="get" action="#">
          <fieldset>
            <div class="form-group">
              <label for="firstname">Firstname</label>
              <input id="firstname" class="form-control" name="firstname" type="text">
            </div>
            <div class="form-group">
              <label for="lastname">Lastname</label>
              <input id="lastname" class="form-control" name="lastname" type="text">
            </div>
            <div class="form-group">
              <label for="username">Username</label>
              <input id="username" class="form-control" name="username" type="text">
            </div>
            <div class="form-group">
              <label for="password">Password</label>
              <input id="password" class="form-control" name="password" type="password">
            </div>
            <div class="form-group">
              <label for="confirm_password">Confirm password</label>
              <input id="confirm_password" class="form-control" name="confirm_password" type="password">
            </div>
            <div class="form-group">
              <label for="email">Email</label>
              <input id="email" class="form-control" name="email" type="email">
            </div>
          </fieldset>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-success">Send message</button>
        <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

@endsection

@section('script')
<script>
  function showModal(){
    $('#myModal').modal('show');
  }
</script>
@endsection