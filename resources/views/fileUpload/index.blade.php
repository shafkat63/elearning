@extends('layout.app') @section('title', 'File Info') @section('mainNav')
@include('layout.nav') @endsection
<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">

<style>
     body {
        font-family: 'Roboto', 'Arial', sans-serif;
    }
    .img-preview {
        border-radius: 5% !important;
        width: 300px !important;
        height: 200px !important;
        object-fit: cover !important;
    }
</style>
<link
    rel="stylesheet"
    href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css"
/>

@section('mainContent')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body p-2 p-sm-2 p-md-2 p-lg-4">
                    <h4 class="card-title">Files</h4>
                    @if ($message = Session::get('success'))
                    <div class="alert alert-success">{{ $message }}</div>
                    @endif

                    <a
                        href="{{ route('Files.create') }}"
                        class="btn btn-gradient-success btn-sm btn-icon-text mb-3"
                    >
                        <i class="mdi mdi-upload btn-icon-prepend"></i>Upload
                        New File
                    </a>

                    <div class="table-responsive fst-italic">
                        <table class="table table-bordered" id="fileTable">
                            <thead class="table-light">
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>File Type</th>
                                    <th>URL</th>
                                    <th>Preview</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <!-- DataTable will populate the tbody -->
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection @section('script')
<script src="{{ asset('assets/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('assets/js/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('assets/js/sweetalert.min.js') }}"></script>
<script src="{{ asset('assets/js/custom.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    var url = "{{ route('Files.file') }}";

    $(document).ready(function () {
        var fileTable = $("#fileTable").DataTable({
            processing: true,
            serverSide: true,
            stateSave: true,
            ajax: {
                url: url,
                type: "POST",
                headers: {
                    "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr(
                        "content"
                    ),
                },
            },
            columns: [
                { data: "id", name: "id" },
                { data: "name", name: "name" },
                { data: "filetype", name: "filetype" },
                {
                    data: "url",
                    name: "url",
                    render: function (data, type, row) {
                        return (
                            '<a href="' +
                            data +
                            '" target="_blank">' +
                            data +
                            "</a>"
                        );
                    },
                },
                {
                    data: "url",
                    name: "url",
                    render: function (data, type, row) {
                        var previewHtml = "";
                        if (row.filetype === "Image") {
                            previewHtml =
                                '<img class="img-preview"  src="' +
                                data +
                                '" alt="' +
                                row.name +
                                '" >';
                        } else if (row.filetype === "Audio") {
                            previewHtml =
                                '<audio controls><source src="' +
                                data +
                                '" type="audio/mp3"></audio>';
                        } else if (row.filetype === "Video") {
                            previewHtml =
                                '<video width="320" height="240" controls><source src="' +
                                data +
                                '" type="video/mp4"></video>';
                        } else {
                            previewHtml =
                                '<a href="' +
                                data +
                                '" target="_blank">Preview</a>';
                        }
                        return previewHtml;
                    },
                },
                {
                    data: null,
                    orderable: false,
                    render: function (data, type, row) {
                        return `
                            <a href="/Files/${row.id}/edit" class="btn btn-outline-primary btn-sm edit-btn" data-file-id="${row.id}">Edit</a>
                            <button class="btn btn-outline-danger btn-sm delete-btn" data-file-id="${row.id}" data-file-name="${row.name}">Delete</button>
                        `;
                    },
                },
            ],
        });

        $("#fileTable").on("click", ".delete-btn", function () {
            var fileId = $(this).data("file-id");
            var fileName = $(this).data("file-name");
            confirmDelete(fileId, fileName);
        });

        function confirmDelete(fileId, fileName) {
            Swal.fire({
                title: "Are you sure?",
                text: `Do you want to delete "${fileName}"?`,
                icon: "warning",
                showCancelButton: true,
                confirmButtonText: "Delete",
                cancelButtonText: "Cancel",
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: "/Files/" + fileId,
                        type: "DELETE",
                        headers: {
                            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr(
                                "content"
                            ),
                        },
                        success: function (response) {
                            console.log(response);
                            fileTable.ajax.reload(); // Reload the DataTable
                            Swal.fire(
                                "Deleted!",
                                "File has been deleted.",
                                "success"
                            );
                        },
                        error: function (xhr) {
                            console.log(xhr.responseText);
                            Swal.fire(
                                "Error!",
                                "Failed to delete file.",
                                "error"
                            );
                        },
                    });
                }
            });
        }
    });
</script>
@endsection
