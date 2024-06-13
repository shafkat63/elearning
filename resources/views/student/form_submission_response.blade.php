@extends('layout.stu_public')

@section('nav')
    @include('layout.st_nav')
@endsection

@section('content')
    <!-- partial -->
<div class="main-panel">
    <div class="content-wrapper container-fluid">
        <div class="col-md-12">
            <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Form Submission Confirmation</h4>
                        <div class="alert alert-success" role="alert">
                            Thank you! Your form has been successfully submitted.
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <h5 class="card-subtitle mb-2 text-muted">Submitted Data:</h5>
                                <ul class="list-group">
                                    <!-- Example: Displaying submitted data. Replace with actual submitted data -->
                                    <li class="list-group-item">
                                    
                                    </li>
                                    <li class="list-group-item">
                                
                                    </li>
                                    <li class="list-group-item">
                                    </li>
                                </ul>
                                <div class="mt-4">
                          
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- content-wrapper ends -->
<!-- partial:../../partials/_footer.html -->
<!-- partial -->
@endsection

@section('script')
<!-- Your scripts here -->
@endsection
