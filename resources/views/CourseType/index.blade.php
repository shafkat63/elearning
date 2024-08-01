@extends('layout.app')

@section('title', 'CourseType Info')

@section('mainNav')
    @include('layout.nav')
@endsection

@section('styles')
    <style>
        .bg-custom {
            background-color: rgb(64, 199, 132);
        }
    </style>

@endsection

@section('mainContent')
<div class="content-wrapper m-0 p-0 pt-2 p-lg-3">
    <div class="row m-0 m-md-0 m-lg-1">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body p-2 p-sm-2 p-md-2 p-lg-4">
                    <h4 class="card-title">
                        <div class="row">
                            <div class="col-md-9 pb-1">Courses</div>
                            <div class="col-md-3">
                                <a href="#" id="filterButton" class="btn btn-gradient-info btn-sm btn-icon-text">
                                    <i class="mdi mdi-filter btn-icon-prepend"></i> Filter
                                </a>
                                <a href="{{ url('CourseType/create') }}" class="btn btn-gradient-success btn-sm btn-icon-text">
                                    <i class="mdi mdi-plus btn-icon-prepend"></i> Add New
                                </a>
                              
                            </div>
                        </div>
                    </h4>
                    <div class="table-responsive text-nowrap">
                        <form action="#" id="fromData" style="display: none">
                            @csrf
                            <div class="card-body bg-custom">
                                <div class="row">
                                    <div class="col-md-2">
                                        <label class="mt-2" for="course_name">Course Name:</label>
                                    </div>
                                    <div class="col-md-10">
                                        <input type="text" class="form-control form-control-sm" name="course_name" id="course_name" placeholder="Enter Course Name">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-12 ml-lg-auto">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <a href="javascript:$('#fromData').toggle();">
                                                <button type="button" class="btn btn-light text-primary btn-sm">
                                                    <i class="mdi mdi-window-close"></i> Close
                                                </button>
                                            </a>
                                            <a href="javascript: ResetSearch();" class="">
                                                <button type="button" class="btn btn-light text-danger btn-sm">
                                                    <i class="mdi mdi-backup-restore"></i> Reset
                                                </button>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <hr />
                        </form>
                        <table class="table" id="dataTableItem">
                            <thead class="table-light">
                                <tr>
                                    <th class="col-md-1">ID</th>
                                    <th class="col-md-3">Name</th>
                                    <th class="col-md-3">Status</th>
                              
                                </tr>
                            </thead>
                            <tbody></tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection




@section('script')
    <!-- Add jQuery and Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>

    <script src="{{ asset('assets/js/sweetalert.min.js') }}"></script>
    <!-- Add Custom JS -->
    <script src="{{ asset('assets/js/custom.js') }}"></script>
    <script>
        var TableData;
        var url = "{{ route('courseType.list') }}";

        $(document).ready(function () {
            // Initialize DataTable
            LoadDataTable();

            $("#filterButton").click(function (e) {
                e.preventDefault();
                $("#fromData").toggle();
                console.log("Filter button clicked and form toggled");
                ReloadDataTable();
            });

            // Reload DataTable when course_name changes
            $("#course_name").on("keyup", function () {
                console.log("Course Name changed");
                ReloadDataTable();
            });
        });

        function LoadDataTable() {
            TableData = $("#dataTableItem").DataTable({
                processing: true,
                serverSide: true,
                responsive: true,
                ajax: {
                    url: url,
                    type: "POST",
                    headers: {
                    "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr(
                        "content"
                    ),
                },
                    data: function (d) {
                        return $.extend({}, d, $("#fromData").serializeObject());
                    },
                    error: function (xhr, error, code) {
                        console.log("Error: " + error);
                        console.log("Code: " + code);
                        console.log(xhr.responseText);
                    }
                },
                columns: [
                    { data: "id" },
                    { data: "name" },
                    { data: "status" },
                  
                    {
                        data: null,
                        orderable: false,
                        defaultContent: "NO Data",
                        render: function (data, type, row) {
                            return (
                                '<button type="button" onclick="editCourse(' +
                                row.id +
                                ')" class="btn btn-outline-info btn-sm"><i class="mdi mdi-pencil"></i> Edit</button> ' +
                                '<button type="button" onclick="deleteCourse(' +
                                row.id +
                                ')" class="btn btn-outline-danger btn-sm"><i class="mdi mdi-delete"></i> Delete</button>'
                            );
                        },
                    },
                ],
            });
        }

        function ReloadDataTable() {
            console.log("Reloading DataTable");
            TableData.ajax.reload();
        }

        function ResetSearch() {
            $("#fromData").trigger("reset");
            console.log("Reset search and reloading DataTable");
            ReloadDataTable();
        }

        function editCourse(ID) {
            window.location.href = "{{ url('CourseType') }}/" + ID + "/edit";
        }

        // Function to handle deleting a course
        function deleteCourse(ID) {
            var csrf_token = $('meta[name="csrf-token"]').attr("content");
            swal({
                title: "Are you sure?",
                text: "Once deleted, you will not be able to recover this course!",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            }).then((willDelete) => {
                if (willDelete) {
                    $.ajax({
                        url: "{{ url('CourseType') }}" + "/" + ID,
                        type: "POST",
                        data: { _method: "DELETE", _token: csrf_token },
                        success: function (data) {
                            console.log(data);
                            var dataResult = JSON.parse(data);
                            if (dataResult.statusCode == 200) {
                                $("#dataTableItem").DataTable().ajax.reload();
                                swal({
                                    title: "Delete Done",
                                    text: "Poof! The course has been deleted!",
                                    icon: "success",
                                    button: "Done",
                                });
                            } else {
                                swal("Your course is safe!");
                            }
                        },
                        error: function (data) {
                            console.log(data);
                            swal({
                                title: "Oops...",
                                text: "Error occurred!",
                                icon: "error",
                                button: "Ok",
                            });
                        },
                    });
                } else {
                    swal("Your courseType is safe!");
                }
            });
        }

        $.fn.serializeObject = function () {
            var obj = {};
            var arr = this.serializeArray();
            $.each(arr, function () {
                if (obj[this.name] !== undefined) {
                    if (!obj[this.name].push) {
                        obj[this.name] = [obj[this.name]];
                    }
                    obj[this.name].push(this.value || "");
                } else {
                    obj[this.name] = this.value || "";
                }
            });
            return obj;
        };
    </script>
@endsection
