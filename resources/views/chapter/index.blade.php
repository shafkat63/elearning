@extends('layout.app') @section('title', 'Chapter Info') @section('mainNav')
@include('layout.nav') @endsection @section('mainContent')
<div class="content-wrapper m-0 p-0 pt-2 p-lg-3">
    <div class="row m-0 m-md-0 m-lg-1">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card ">
                <div class="card-body p-2 p-sm-2 p-md-2 p-lg-4">
                    <h4 class="card-title">
                        <div class="row m-0 p-0">
                            <div class="col-md-9 mb-2">Chapter List Info</div>
                            <div class="col-md-3">
                                <a
                                    href="#"
                                    id="filterButton"
                                    class="btn btn-gradient-info btn-sm btn-icon-text"
                                >
                                    <i
                                        class="mdi mdi-filter btn-icon-prepend"
                                    ></i
                                    >Advance Filter</a
                                >
                                <a
                                    href="{{ url('Chapter/create') }}"
                                    class="btn btn-gradient-success btn-sm btn-icon-text"
                                >
                                    <i class="mdi mdi-plus btn-icon-prepend"></i
                                    >Add New</a
                                >
                            </div>
                        </div>
                    </h4>
                    <div class="table-responsive text-nowrap">
                        <form action="#" id="fromData" style="display: none">
                            @csrf
                            <blockquote class="blockquote blockquote-success">
                                <div class="card-body">
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label for="subject_id"
                                                    >Subject :
                                                </label>
                                                <select
                                                    class="form-control form-control-sm"
                                                    name="subject_id"
                                                    id="subject_id"
                                                >
                                                    <option value="">
                                                        Select Subject
                                                    </option>
                                                    @foreach ($subject as $item)
                                                    <option
                                                        value="{{ $item->id }}"
                                                        }}
                                                    >
                                                        {{ $item->name }}
                                                    </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="col-md-6">
                                                <label
                                                    class="mt-2"
                                                    for="paper_id"
                                                    >Paper :
                                                </label>
                                                <select
                                                    class="form-control form-control-sm"
                                                    name="paper_id"
                                                    id="paper_id"
                                                >
                                                    <option value="">
                                                        Select Paper
                                                    </option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-12 ml-lg-auto">
                                            <div
                                                class="d-flex justify-content-between align-items-center"
                                            >
                                                <a
                                                    href="Javascript:$('#fromData').toggle();"
                                                    ><button
                                                        type="button"
                                                        class="btn btn-light text-primary btn-sm"
                                                    >
                                                        <i
                                                            class="mdi mdi-window-close"
                                                        ></i>
                                                        Close
                                                    </button></a
                                                >
                                                <a
                                                    href="javascript: ResetSearch();"
                                                    class=""
                                                    ><button
                                                        type="button"
                                                        class="btn btn-light text-danger btn-sm"
                                                    >
                                                        <i
                                                            class="mdi mdi-backup-restore"
                                                        ></i>
                                                        Reset
                                                    </button></a
                                                >
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </blockquote>
                            <hr />
                        </form>
                        <table class="table" id="dataTableItem">
                            <thead class="table-light">
                                <tr>
                                    <th class="col-md-2">Subject Name</th>
                                    <th class="col-md-2">Paper Name</th>
                                    <th class="col-md-5">Name</th>
                                    <th class="col-md-3">Action</th>
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

@endsection @section('script')
<script src="{{ asset('assets/js/sweetalert.min.js') }}"></script>
<script src="{{ asset('assets/js/custom.js') }}"></script>
<script>
    var TableData;
    var url = "{{ route('/chapter/list') }}";

    // $(document).ready(function () {
    //   LoadDataTable();

    //   $('#filterButton').click(function(e) {
    //         e.preventDefault(); // Prevent the default behavior of the anchor element
    //         $('#fromData').toggle();
    //         ReloadDataTable();
    //     });

    //   $("#subject_id").on("change", function () { ReloadDataTable(); });
    //   $("#paper_id").on("change", function () { ReloadDataTable(); });
    // });

    $(document).ready(function () {
        LoadDataTable();

        // Toggle filter form and reload DataTable
        $("#filterButton").click(function (e) {
            e.preventDefault(); // Prevent default behavior
            $("#fromData").toggle(); // Toggle filter form visibility
        });

        // Reload DataTable when filter form elements change
        $("#subject_id, #paper_id").on("change", function () {
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
                data: function (d) {
                    return $.extend({}, d, {
                        _token: "{{ csrf_token() }}",
                        subject_id: $("#subject_id").val(),
                        paper_id: $("#paper_id").val(),
                    });
                },
            },
            columns: [
                { data: "subject_name" },
                { data: "paper_name" },
                { data: "name" },
                {
                    data: null,
                    orderable: false,
                    defaultContent: "NO Data",
                    render: function (data, type, row) {
                        return (
                            '<button type="button" onclick="showData(' +
                            row.id +
                            ')" class="btn btn-outline-info btn-sm"><i class="mdi mdi-pencil"></i> Edit</button> <button type="button" onclick="deleteSingleData(' +
                            row.id +
                            ')" class="btn btn-outline-danger btn-sm"><i class="mdi mdi-delete"></i> Delete</button>'
                        );
                    },
                },
            ],
        });
    }

    // function ReloadDataTable() {
    //   TableData.ajax.url(url +"?" +$("#fromData").serialize()).load();
    // }

    function ReloadDataTable() {
        TableData.ajax.reload(null, false); // Reload DataTable without resetting pagination
    }

    function ResetSearch() {
        $("#fromData").trigger("reset");
        ReloadDataTable();
    }

    // function ResetSearch() {
    //   $("#fromData").trigger("reset");
    //   ReloadDataTable();
    // }

    function showData(ID) {
        showSingleData("{{ url('Chapter') }}", ID);
    }
    function deleteSingleData(ID) {
        var csrf_token = $('meta[name="csrf-token"]').attr("content");
        swal({
            title: "Are you sure?",
            text: "Once deleted, you will not be able to recover this imaginary file!",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        }).then((willDelete) => {
            if (willDelete) {
                $.ajax({
                    url: "{{ url('Chapter') }}" + "/" + ID,
                    type: "POST",
                    data: { _method: "DELETE", _token: csrf_token },
                    success: function (data) {
                        console.log(data);
                        var dataResult = JSON.parse(data);
                        if (dataResult.statusCode == 200) {
                            $("#dataTableItem").DataTable().ajax.reload();
                            swal({
                                title: "Delete Done",
                                text: "Poof! Your data file has been deleted!",
                                icon: "success",
                                button: "Done",
                            });
                        } else {
                            swal("Your imaginary file is safe!");
                        }
                    },
                    error: function (data) {
                        console.log(data);
                        swal({
                            title: "Opps...",
                            text: "Error occured !",
                            icon: "error",
                            button: "Ok ",
                        });
                    },
                });
            } else {
                swal("Your imaginary file is safe!");
            }
        });
    }

    $("#subject_id").change(function () {
        var subject_id = this.value;
        ShowPaper(subject_id);
    });

    function ShowPaper(subject_id) {
        var csrf_tokens = document.querySelector(
            'meta[name="csrf-token"]'
        ).content;
        url = "{{ url('getPaper') }}";
        $.ajax({
            url: url,
            type: "POST",
            data: { subject_id: subject_id, _token: csrf_tokens },
            datatype: "JSON",
            success: function (data) {
                console.log(data);
                var category = $.parseJSON(data);
                if (category != "") {
                    var markup = "<option value=''>Select Paper</option>";
                    for (var x = 0; x < category.length; x++) {
                        markup +=
                            "<option value=" +
                            category[x].id +
                            ">" +
                            category[x].name +
                            "</option>";
                    }
                    $("#paper_id").html(markup).show();
                } else {
                    var markup = "<option value=''>Select Paper</option>";
                    $("#paper_id").html(markup).show();
                }
            },
        });
    }
</script>
@endsection
