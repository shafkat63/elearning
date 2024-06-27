@extends('layout.app') @section('title', 'Paper Info') @section('mainNav')
@include('layout.nav') @endsection




</style>
@section('mainContent')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body p-2 p-sm-2 p-md-2 p-lg-4">
                    <h4 class="card-title">
                        Files
                    </h4>
                    @if ($message = Session::get('success'))
                    <div class="alert alert-success">
                        {{ $message }}
                    </div>
                    @endif

                    <a href="{{ route('Files.create') }}" class="btn btn-gradient-success btn-sm btn-icon-text mb-3">
                        <i class="mdi mdi-upload btn-icon-prepend"></i>Upload New File
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
                                @foreach ($files as $file)
                                <tr id="fileRow_{{ $file->id }}">
                                    <td>{{ $file->id }}</td>
                                    <td>{{ $file->name }}</td>
                                    <td>{{ $file->filetype }}</td>
                                    <td><a href="{{ $file->url }}" target="_blank">{{ $file->url }}</a></td>
                                    <td>
                                        <button class="btn btn-outline-danger delete-btn" data-file-id="{{ $file->id }}" data-file-name="{{ $file->name }}">Delete</button>
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
@endsection

@section('script')
<script src="{{ asset('assets/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('assets/js/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('assets/js/sweetalert.min.js') }}"></script>
<script src="{{ asset('assets/js/custom.js') }}"></script>

<script>
     var TableData;
    var url = "{{ route('Files.file') }}";

    $(document).ready(function () {
        var fileTable = $('#fileTable').DataTable({
        processing: true,
        serverSide: true,
        ajax: {
            url: url,
            type: 'POST',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
        },
        columns: [
            { data: 'id', name: 'id' },
            { data: 'name', name: 'name' },
            { data: 'filetype', name: 'filetype' }, 
            { data: 'url', name: 'url',
                render: function (data, type, row) {
                    return '<a href="' + data + '" target="_blank">' + data + '</a>';
                }
            },
            {
                data: 'url',
                name: 'url',
                render: function (data, type, row) {
                    var previewHtml = '';
                    if (row.filetype === 'Image') {
                        previewHtml = '<img src="' + data + '" alt="' + row.name + '" style="max-width: 100px; max-height: 100px; object-fit: cover;">';
                    } else if (row.filetype === 'Audio') {
                        previewHtml = '<audio controls><source src="' + data + '" type="audio/mp3"></audio>';
                    } else if (row.filetype === 'Video') {
                        previewHtml = '<video width="320" height="240" controls><source src="' + data + '" type="video/mp4"></video>';
                    } else {
                        previewHtml = '<a href="' + data + '" target="_blank">Preview</a>'; // Default preview link
                    }
                    return previewHtml;
                }
            },
            {
                data: null,
                orderable: false,
                render: function (data, type, row) {
                    return '<button class="btn btn-outline-danger delete-btn" data-file-id="' + row.id + '" data-file-name="' + row.name + '">Delete</button>';
                }
            }
        ]
    });

        $('#fileTable').on('click', '.delete-btn', function () {
            var fileId = $(this).data('file-id');
            var fileName = $(this).data('file-name');
            confirmDelete(fileId, fileName);
        });

        function confirmDelete(fileId, fileName) {
            if (confirm('Are you sure you want to delete "' + fileName + '"?')) {
                $.ajax({
                    url: '/Files/' + fileId,
                    type: 'DELETE',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function (response) {
                        console.log(response);
                        fileTable.ajax.reload(); // Reload the DataTable
                        alert('File deleted successfully.');
                    },
                    error: function (xhr) {
                        console.log(xhr.responseText);
                        alert('Error deleting file.');
                    }
                });
            }
        }
    });
</script>
@endsection