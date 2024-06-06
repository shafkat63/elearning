@extends('layout.app')
@section('title', 'Permission Info')
@section('mainNav')
@include('layout.nav')
@endsection

@section('mainContent')
<div class="content-wrapper">
  <div class="page-header">
    <h3 class="page-title"> Profile </h3>
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="#">User</a></li>
        <li class="breadcrumb-item active" aria-current="page">Profile</li>
      </ol>
    </nav>
  </div>
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-body">
          <div class="row justify-content-center">
            <div class="col-lg-8">
              <div class="border-bottom text-center pb-4">
                <div class="position-relative d-inline-block">
                    <img src="../../../assets/images/faces/face12.jpg" alt="profile" class="img-lg rounded-circle mb-3" />
                    <!-- Edit button with icon -->
                    <button class="btn position-absolute bottom-0 end-0" style="transform: translate(50%, 50%);">
                        <i class="mdi mdi-pencil"></i>
                    </button>
                </div>
                <h3>{{ auth()->user()->name }}</h3>
            </div>
              <div class="border-bottom py-4">
                <p>User Role</p>
                <div>
                  @if(auth()->check())
                      @foreach(auth()->user()->roles as $role)
                        <label class="badge badge-outline-dark my-1">{{ $role->name }}</label>
                      @endforeach
                  @endif
                </div>
              </div>
              {{-- <div class="border-bottom py-4">
                <div class="d-flex mb-3">
                  <div class="progress progress-md flex-grow">
                    <div class="progress-bar bg-gradient-primary" role="progressbar" aria-valuenow="55" style="width: 55%" aria-valuemin="0" aria-valuemax="100"></div>
                  </div>
                </div>
                <div class="d-flex">
                  <div class="progress progress-md flex-grow">
                    <div class="progress-bar bg-gradient-success" role="progressbar" aria-valuenow="75" style="width: 75%" aria-valuemin="0" aria-valuemax="100"></div>
                  </div>
                </div>
              </div> --}}
              <div class="py-4">
                <p class="clearfix">
                  <span class="float-start"> Status </span>
                  <span class="float-end text-muted"> Active </span>
                </p>
                <p class="clearfix">
                  <span class="float-start"> Phone </span>
                  <span class="float-end text-muted"> {{ auth()->user()->phone }} </span>
                </p>
                <p class="clearfix">
                  <span class="float-start"> Mail </span>
                  <span class="float-end text-muted"> {{ auth()->user()->email }} </span>
                </p>
                <p class="clearfix">
                  <span class="float-start"> Login ID </span>
                  <span class="float-end text-muted">
                    <a href="#">{{ auth()->user()->email }}</a>
                  </span>
                </p>
              </div>
              {{-- <div class="d-grid gap-2">
                <button class="btn btn-gradient-primary btn-block">Preview</button>
              </div> --}}
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>


@endsection

@section('script')
<script src="{{ asset('assets/js/sweetalert.min.js') }}"></script>
<script src="{{ asset('assets/js/custom.js') }}"></script>
<script>
var TableData;
function ReloadDataTable() {
  TableData.ajax.url("/Users/list?" + $("#fromData").serialize()).load();
}
function LoadDataTable() {
    TableData =$('#dataTableItem').DataTable({
      processing: true,
      serverSide: true,
      responsive: true,
      ajax: {
          url: "/Users/list?" + $("#fromData").serialize(),
          type: 'POST',
      },
      columns: [
          { data: 'name' },
          { data: 'email' },
          { data: 'phone' },
          { data: 'roles' }, // Add this line to display roles
          {
              data: null,
              orderable: false,
              defaultContent: "NO Data",
              render: function (data, type, row) {
                  return '<button type="button" onclick="showData(' + row.id + ')" class="btn btn-outline-info btn-sm"><i class="mdi mdi-pencil"></i> Edit</button> <button type="button" onclick="deleteSingleData(' + row.id + ')" class="btn btn-outline-danger btn-sm"><i class="mdi mdi-delete"></i> Delete</button>';
              }
          }
      ],
  });
}
function ResetSearch() {
  $("#fromData").trigger("reset");
  ReloadDataTable();
}
$(document).ready(function () {
  LoadDataTable();
});
function showData(ID){
  showSingleData("{{ url('User') }}" , ID);
}
function  deleteSingleData(ID) {
  var csrf_token = $('meta[name="csrf-token"]').attr('content');
  swal({
      title: "Are you sure?",
      text: "Once deleted, you will not be able to recover this imaginary file!",
      icon: "warning",
      buttons: true,
      dangerMode: true,
  }).then((willDelete) => {
      if (willDelete) {
          $.ajax({
              url: "{{ url('User') }}" + '/' + ID,
              type: "POST",
              data: {'_method': 'DELETE', '_token': csrf_token},
              success: function (data) {
                  console.log(data);
                  var dataResult = JSON.parse(data);
                  if (dataResult.statusCode == 200) {
                      $('#dataTableItem').DataTable().ajax.reload();
                      swal({
                          title: "Delete Done",
                          text: "Poof! Your data file has been deleted!",
                          icon: "success",
                          button: "Done"
                      });
                  } else {
                      swal("Your imaginary file is safe!");
                  }
              }, error: function (data) {
                  console.log(data);
                  swal({
                      title: "Opps...",
                      text: "Error occured !",
                      icon: "error",
                      button: 'Ok ',
                  });
              }
          });
      } else {
          swal("Your imaginary file is safe!");
      }
  });
}
</script>
@endsection
