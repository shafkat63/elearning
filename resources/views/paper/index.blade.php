@extends('layout.app')
@section('title', 'Paper Info')
@section('mainNav')
@include('layout.nav')
@endsection
<style>

    .bg-custom{
        background-color: rgb(64, 199, 132);
    }
</style>
@section('mainContent')
<div class="content-wrapper">
  <div class="row">
    <div class="col-lg-12 grid-margin stretch-card">
      <div class="card">
        <div class="card-body">
            <h4 class="card-title">
                <div class="row">
                    <div class="col-md-9">
                      Paper List Info
                    </div>
                    <div class="col-md-3">
                      <a href="#" id="filterButton" class="btn btn-gradient-info  btn-sm btn-icon-text">
                        <i class="mdi mdi-filter btn-icon-prepend"></i>Filter</a>
                      <a href="{{url('Paper/create')}}" class="btn btn-gradient-success  btn-sm btn-icon-text">
                        <i class="mdi mdi-plus  btn-icon-prepend"></i>Add New</a>
                    </div>
                </div>
            </h4>

            <form action="#" id="fromData" style="display: none">@csrf
                <div class="card-body bg-custom">
                  <div class="form-group">
                    <div class="row">
                      <div class="col-md-2">
                        <label class="mt-2" for="subject_id">Subject : </label>
                      </div>
                      <div class="col-md-10">
                        <select class="form-control form-control-sm" name="subject_id" id="subject_id">
                          <option value="">Select Subject</option>
                          @foreach ($subject as $item)
                              <option value="{{ $item->id }}">
                                  {{ $item->name }}
                              </option>
                          @endforeach
                        </select>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-lg-12 ml-lg-auto">
                        <div class="d-flex justify-content-between align-items-center">
                            <a href="Javascript:$('#fromData').toggle();"><button type="button" class="btn btn-light text-primary btn-sm"><i class="mdi mdi-window-close"></i> Close</button></a>
                            <a href="javascript: ResetSearch();" class=""><button type="button" class="btn btn-light text-danger btn-sm"><i class="mdi mdi-backup-restore "></i> Reset</button></a>
                        </div>
                    </div>
                  </div>
                </div>
                <hr />
            </form>
            <table  class="table datatable-responsive w-100" id="dataTableItem">
                <thead>
                    <tr>
                        <th>Subject Name</th>
                        <th>Paper Name</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                </tbody>
            </table>
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
var url = "{{ route('/paper/list') }}";

$(document).ready(function () {
    // Initialize DataTable
    LoadDataTable();

    // Toggle filter form and reload DataTable on filter button click
    $('#filterButton').click(function(e) {
        e.preventDefault();
        $('#fromData').toggle();
        console.log('Filter button clicked and form toggled');
        ReloadDataTable();
    });

    // Reload DataTable when subject_id changes
    $("#subject_id").on("change", function () {
        console.log('Subject ID changed');
        ReloadDataTable();
    });
});

// Function to initialize DataTable
function LoadDataTable() {
    TableData = $('#dataTableItem').DataTable({
        processing: true,
        serverSide: true,
        responsive: true,
        ajax: {
            url: url,
            type: 'POST',
            data: function (d) {
                return $.extend({}, d, $("#fromData").serializeObject());
            },
        },
        columns: [
            { data: 'subject_name' },
            { data: 'name' },
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

// Function to reload DataTable with new filter values
function ReloadDataTable() {
    console.log('Reloading DataTable');
    TableData.ajax.reload();
}

// Function to reset filters and reload DataTable
function ResetSearch() {
    $("#fromData").trigger("reset");
    console.log('Reset search and reloading DataTable');
    ReloadDataTable();
}

// Function to handle showing data (stub function for actual implementation)
function showData(ID) {
    showSingleData("{{ url('Paper') }}", ID);
}

// Function to handle deleting data
function deleteSingleData(ID) {
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
                url: "{{ url('Paper') }}" + '/' + ID,
                type: "POST",
                data: { '_method': 'DELETE', '_token': csrf_token },
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
                },
                error: function (data) {
                    console.log(data);
                    swal({
                        title: "Oops...",
                        text: "Error occurred!",
                        icon: "error",
                        button: 'Ok',
                    });
                }
            });
        } else {
            swal("Your imaginary file is safe!");
        }
    });
}

$.fn.serializeObject = function(){
    var obj = {};
    var arr = this.serializeArray();
    $.each(arr, function() {
        if (obj[this.name] !== undefined) {
            if (!obj[this.name].push) {
                obj[this.name] = [obj[this.name]];
            }
            obj[this.name].push(this.value || '');
        } else {
            obj[this.name] = this.value || '';
        }
    });
    return obj;
};

</script>
@endsection
