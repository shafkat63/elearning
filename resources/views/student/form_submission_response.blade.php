@extends('layout.stu_public')

@section('nav')
    @include('layout.st_nav')
@endsection

@section('content')
<style>
  .profile-card {
    background-color: #fff;
    border: 1px solid #e0e0e0;
    border-radius: 8px;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    padding: 20px;
  }
  .profile-header {
    text-align: center;
    padding-bottom: 20px;
    border-bottom: 1px solid #e0e0e0;
  }
  .profile-header img {
    border-radius: 50%;
    width: 120px;
    height: 120px;
  }
  .profile-header h3 {
    margin-top: 10px;
    margin-bottom: 5px;
  }
  .profile-header p {
    margin-bottom: 0;
    color: #6c757d;
  }
  .profile-info {
    padding-top: 20px;
  }
  .profile-info .info-item {
    display: flex;
    justify-content: space-between;
    padding: 10px 0;
    border-bottom: 1px solid #e0e0e0;
  }
  .profile-info .info-item:last-child {
    border-bottom: none;
  }
  .profile-info .info-item span {
    font-weight: 600;
  }
  .profile-info .info-item .text-muted {
    color: #6c757d;
  }
  .alert-success {
    background-color: #d4edda;
    border-color: #c3e6cb;
    color: #155724;
    border-radius: 4px;
    padding: 10px;
  }
  .table {
    width: 100%;
    margin-bottom: 1rem;
    color: #212529;
  }
  .table th,
  .table td {
    padding: 0.75rem;
    vertical-align: top;
    border-top: 1px solid #dee2e6;
  }
  .table thead th {
    vertical-align: bottom;
    border-bottom: 2px solid #dee2e6;
  }
  .table-striped tbody tr:nth-of-type(odd) {
    background-color: rgba(0, 0, 0, 0.05);
  }
</style>

<div class="main-panel">
    <div class="content-wrapper container-fluid d-flex justify-content-center">
        <div class="col-md-8">
            <div class="col-md-12 grid-margin stretch-card">
                <div class="card profile-card">
                    <div class="card-body">
                        <h4 class="card-title">Form Submission Confirmation</h4>
                        <div class="alert alert-success" role="alert">
                            Thank you! Your form has been successfully submitted.
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <h5 class="card-subtitle mb-2 text-muted">Submitted Data:</h5>
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>Description</th>
                                            <th>Result</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>Student Name</td>
                                            <td>{{ $studentName }}</td>
                                        </tr>
                                        <tr>
                                            <td>Subject Name</td>
                                            <td>{{ $subjectName }}</td>
                                        </tr>
                                        <tr>
                                            <td>Paper Name</td>
                                            <td>{{ $PaperName }}</td>
                                        </tr>
                                        <tr>
                                            <td>Chapter Name</td>
                                            <td>{{ $chapterName }}</td>
                                        </tr>
                                        <tr>
                                            <td>Total Questions</td>
                                            <td>{{ $questionTotal }}</td>
                                        </tr>
                                        <tr>
                                            <td>Correct Answer</td>
                                            <td>{{ $questionCorrect }}</td>
                                        </tr>
                                        <tr>
                                            <td>Wrong Answer</td>
                                            <td class="text-danger font-weight-bold">{{ $questionWrong }}</td>
                                        </tr>
                                    </tbody>
                                </table>
                                <a href="showResult/{{$exam_id}}" id="showResultButton" class="btn btn-primary mt-4">Show Result</a>
                   
                                <div class="mt-4"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<!-- content-wrapper ends -->
@endsection

@section('script')
<!-- Your scripts here -->
@endsection
