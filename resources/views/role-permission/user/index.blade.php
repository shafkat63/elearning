@extends('layout.app')
@section('title', 'Permission Info')
@section('mainNav')
@include('layout.nav')
@endsection

@section('mainContent')
<div class="content-wrapper m-0 p-0 p-lg-3 ">
  <div class="row m-0 m-md-0 m-lg-1">
    <div class="col-lg-12 grid-margin stretch-card">
      <div class="card">
        <div class="card-body p-2 p-sm-2 p-md-2 p-lg-4">
            <h4 class="card-title">
                <div class="row">
                    <div class="col-md-10 pb-2">
                        User Info
                    </div>
                    <div class="col-md-2">
                      <a href="{{url('User/create')}}" class="btn btn-gradient-success  btn-sm btn-icon-text">
                        <i class="mdi mdi-plus  btn-icon-prepend"></i>Add New</a>
                    </div>
                </div>
            </h4>
<div class="table-responsive text-nowrap">


          <form action="#" id="fromData" style="display: none">@csrf</form>
          <table  class="table" id="dataTableItem">
            <thead class="table-light">
              <tr>
                <th>Name</th>
                <th> Email </th>
                <th> Phone </th>
                <th> Roles </th>
                <th> Action </th>
              </tr>
            </thead>

            </tbody>
          </table>
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
var url = "{{ route('/Users/list') }}";
function ReloadDataTable() {
  TableData.ajax.url(url +"?" + $("#fromData").serialize()).load();
}
function LoadDataTable() {
    TableData =$('#dataTableItem').DataTable({
      processing: true,
      serverSide: true,
      responsive: true,
      ajax: {
          url: url +"?" + $("#fromData").serialize(),
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
