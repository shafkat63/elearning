@extends('layout.app')
@section('title', 'Role Edit')
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
                  <div class="d-flex flex-row align-items-center">
                    Role <div class=" badge badge-pill badge-danger"><i class="mdi mdi-account-key"></i>{{$role->name}}</div> Permission 
                  </div> 
                </div>
                <div class="col-md-1">
                <a href="{{url('roles')}}" class="btn btn-gradient-success btn-sm btn-icon-text">
                    <i class="mdi mdi-arrow-left btn-icon-prepend"></i> Back </a>
                </div>
            </div>
          </h4>
          
          @if(session('status'))
          <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <div class="alert alert-success text-center" role="alert">
                        {{session('status')}}
                    </div>
                    
                </div>
            </div>
          </div>
          @endif
          <form class="cmxform" id="signupForm" method="POST" action="{{url('roles/'.$role->id.'/save-permission')}}">
            @csrf
            @method('PUT')
            <fieldset>
              <div class="form-group">
                @error('permission')
                  <span class="text">{{$message}}</span>
                  
                @enderror
                <label for="firstname">Permission</label>
                <div class="form-group">
                  <div class="row">
                    @foreach ($permission as $items )
                      <div class="col-md-3">
                        <div class="form-check">
                          <label class="form-check-label">
                            <input type="checkbox" name="permission[]" value="{{$items->name}}" {{in_array($items->id,$rolePermission) ? 'checked':''}} class="form-check-input"> {{$items->name}} <i class="input-helper"></i></label>
                        </div>
                      </div>
                    @endforeach
                  
                </div>
              </div>
              
              <input class="btn btn-primary" type="submit" value="Update">
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