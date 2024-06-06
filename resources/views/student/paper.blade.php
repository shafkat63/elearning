<!-- @extends('layout.stu_public')

@section('nav')
    @include('layout.st_nav')
@endsection

@section('content')
    <!-- partial -->
<div class="main-panel bg-info">
    <div class="content-wrapper container-fluid">
        <div class="col-md-12">
            <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-4">
                                <ul
                                    class="nav nav-tabs nav-tabs-vertical"
                                    role="tablist"
                                ></ul>
                            </div>

                            @foreach($questions as $question)
                            <div class="text-center">
                                <p>
                                    {{ $question->question_name }}
                                </p>
                                <hr class="my-4" />
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                <!-- content-wrapper ends -->
                <!-- partial:../../partials/_footer.html -->
                <!-- partial -->
                @endsection @section('script')
                <!-- Your scripts here -->
                @endsection
            </div>
        </div>
    </div>
</div>
