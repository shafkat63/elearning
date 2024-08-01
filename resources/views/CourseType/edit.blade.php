@extends('layout.app')
@section('title', 'Edit CourseType')
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
                                Edit CourseType
                            </div>
                            <div class="col-md-1">
                                <a href="{{ url('CourseType') }}" class="btn btn-gradient-success btn-sm btn-icon-text">
                                    <i class="mdi mdi-arrow-left btn-icon-prepend"></i> Back </a>
                            </div>
                        </div>
                    </h4>

                    <form class="cmxform" id="dataForm">
                        @csrf

                        <input type="hidden" id="id" name="id" value="{{ $courseType->id }}">
                        <fieldset>
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input id="name" class="form-control" name="name" type="text"
                                    value="{{ old('name', $courseType->name) }}" required>
                                <label id="error-name" for="name"
                                    class="validation-invalid-label text-danger mt-1"></label>
                            </div>
                            <div class="form-group">
                                <label for="status">Status</label>
                                <select id="status" class="form-control" name="status" required>
                                    <option value="active" {{ $courseType->status == 'active' ? 'selected' : ''
                                        }}>Active</option>
                                    <option value="inactive" {{ $courseType->status == 'inactive' ? 'selected' : ''
                                        }}>Inactive</option>
                                </select>
                                <label id="error-status" for="status"
                                    class="validation-invalid-label text-danger mt-1"></label>
                            </div>

                            <button class="btn btn-primary" id="btnSubmit" type="button" value="Submit">Submit</button>
                        </fieldset>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
<script src="{{ asset('assets/js/sweetalert.min.js') }}"></script>
<script src="{{ asset('assets/js/customupdate.js') }}"></script>
<script>
    $("#btnSubmit").on("click", function () {
    var courseTypeId = $('#id').val();
    $('#id').val();
    var url = "{{ url('CourseType') }}/" + courseTypeId;
    SaveData(url, $("#dataForm").serialize());




  });
</script>
@endsection