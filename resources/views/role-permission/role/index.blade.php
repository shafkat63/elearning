@extends('layout.app')
@section('title', 'Role Info')
@section('mainNav')
@include('layout.nav')
@endsection

@section('mainContent')
<div class="content-wrapper m-0 p-0 p-lg-3 ">
  <div class="row m-0 m-md-0 m-lg-1">
    <div class="col-lg-12 grid-margin stretch-card">
      <div class="card">
        <div class="card-body p-2 p-sm-2 p-md-2 p-lg-4 ">
            <h4 class="card-title">
                <div class="row">
                    <div class="col-md-10 pb-1">
                      Role Info 
                    </div>
                    <div class="col-md-2">
                      <a href="{{url('roles/create')}}" class="btn btn-gradient-success  btn-sm btn-icon-text">
                        <i class="mdi mdi-plus  btn-icon-prepend"></i>Add New</a>
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
            
          <div class="table-responsive text-nowrap">
          <table class="table">
            <thead>
              <tr>
                <th> # </th>
                <th> Name </th>
                <th> Action </th>
              </tr>
            </thead>
            <tbody>
              @foreach ($role as $item)
                <tr>
                  <td> {{ $item->id}} </td>
                  <td> {{ $item->name}} </td>
                  <td> 
                    <a href="{{url('roles/'.$item->id.'/give-permission')}}" class="btn btn-outline-success  btn-sm"><i class="mdi mdi-pencil"></i> Add /Edit Role Permission</a> 
                    <a href="{{url('roles/'.$item->id.'/edit')}}" class="btn btn-outline-info btn-sm"><i class="mdi mdi-pencil"></i> Edit</a> 
                    <a href="{{url('roles/'.$item->id.'/delete')}}" class="btn btn-outline-danger btn-sm"><i class="mdi mdi-delete"></i> Delete</a>
                  </td>
                </tr>
              @endforeach
              
            </tbody>
          </table>
        </div>
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
        <form class="cmxform" id="Form" method="post" action="#">
          <fieldset>
            <div class="form-group">
              <label for="Name">Name</label>
              <input id="Name" class="form-control" name="Name" type="text">
            </div>
          </fieldset>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" onclick="saveData()" class="btn btn-success">Save</button>
        <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

@endsection

@section('script')
<script>
function saveData() {
    url = "{{ url('save-survey-dtl') }}";
    $.ajax({
        url: url,
        type: "POST",
        data:new FormData($(".showDtl form")[0]),
        contentType: false,
        processData: false,
        success: function (data) {
            console.log(data);
            var dataResult = JSON.parse(data);
            if (dataResult.statusCode == 200) {
                swal("Success", dataResult.statusMsg);
                $('.showDtl form')[0].reset();
            } else {
                swal({
                    title: "Oops",
                    text:  "Save Failed",
                    icon: "error",
                    timer: '1500'
                });
            }
        }, error: function (data) {
            console.log(data);
            swal({
                title: "Oops",
                text: "Error occured",
                icon: "error",
                timer: '1500'
            });
        }
    });
    return false;
};
</script>
@endsection