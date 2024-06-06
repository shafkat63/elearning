@extends('layout.app')
@section('title', 'Add Role')
@section('mainNav')
@include('layout.nav')
@endsection

@section('mainContent')
<div class="content-wrapper">
  <div class="row">
    <div class="col-lg-12">
      <div class="card">
        <div class="card-body">
            <h4 class="card-title">
                <div class="row">
                    <div class="col-md-11">
                        Add Role  
                    </div>
                    <div class="col-md-1">
                    <a href="{{url('roles')}}" class="btn btn-gradient-success btn-sm btn-icon-text">
                        <i class="mdi mdi-arrow-left btn-icon-prepend"></i> Back </a>
                    </div>
                </div>
            </h4>
            
          <form class="cmxform" id="signupForm" method="POST" action="{{url('roles')}}">
            @csrf
            <fieldset>
              <div class="form-group">
                <label for="firstname">Role Name</label>
                <input id="firstname" class="form-control" name="name" type="text">
              </div>
              
              <input class="btn btn-primary" type="submit" value="Submit">
            </fieldset>
          </form>
        </div>
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