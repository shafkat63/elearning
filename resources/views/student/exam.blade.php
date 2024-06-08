@extends('layout.stu_public') @section('content')
<!-- partial:partials/_horizontal-navbar.html -->
@section('nav') @include('layout.st_nav') @endsection
<!-- partial -->
<style>
    .card-shadow {
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        border: 1px solid gray;
    }
    .full-height {
            height: 100vh; /* 100% of the viewport height */
        }
</style>
<div class="main-panel">
    <div class="content-wrapper bg-secondary">
        <div class="row">
            <div class="col-12">
                <!-- Main Panel -->
                <div class="card bg-secondary">
                    <div class="card-body">
                        <div class="row justify-content-center">
                            @foreach($subjects as $data)
                            <form
                                method="POST"
                                action="{{ url('getPaper/' . $data->id) }}"
                                class="col-xl-3 col-lg-4 col-md-6 col-sm-12 mb-4"
                                id="paperForm"
                            >
                                @csrf
                                <div class="card border-0 rounded-3 shadow-sm">
                                    <div class="card-body">
                                        <div class="text-center mb-3">
                                            <i
                                                class="mdi mdi-book-open-page-variant text-danger icon-md"
                                            ></i>
                                        </div>
                                        <div class="text-center">
                                            <h5
                                                class="font-weight-bold text-dark"
                                            >
                                                {{$data->name}}
                                            </h5>
                                        </div>
                                        <div class="text-center mt-3">
                                            <button
                                                type="button"
                                                onclick="showModalPaper('{{$data->id}}')"
                                                class="btn btn-dark btn-sm"
                                            >
                                                Enter
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div
        class="modal fade bd-example-modal-lg"
        id="modal"
        tabindex="-1"
        role="dialog"
        aria-labelledby="myLargeModalLabel"
    >
        <div class="modal-dialog modal-lg">
            <div class="modal-content content-wrapper">
                <div class="modal-header">
                    <h5 class="modal-title" id="headerName">Papers</h5>
                    <button
                        type="button"
                        class="close"
                        data-dismiss="#modal"
                        aria-label="Close"
                        id="close"
                    >
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body container bg-secondary mt-4">
                    <div
                        class="card-body justify-content-center bg-secondary row"
                        id="paperDetails"
                    ></div>
                </div>
            </div>
        </div>
    </div>

    <!-- content-wrapper ends -->
    <!-- partial:../../partials/_footer.html -->

    <!-- partial -->
</div>
<!-- main-panel ends -->

@endsection @section('script')
<script>
    // function showModal(ID) {
    //     $("#modal").modal("show");
    //     var subID = ID;
    //     console.log(subID);
    //     $("#SubjectID").val(subID);
    // }
    function getData() {
        $("#modal").modal("hide");
        $("#modal2").modal("hide");

    };

    function showModalPaper(subjectId) {
        $("#paperDetails").empty();
        $("#headerName").text("Paper");

        $.ajax({
            url: "/getPaper/" + subjectId,
            method: "GET",
            success: function (response) {
                console.log(typeof response);
                response = JSON.parse(response);

                // Populate the modal with the response data
                if (response.length > 0) {
                    $("#paperDetails").empty();
                    response.forEach(function (paper) {
                        console.log(paper);
                        $("#paperDetails").append(
                            `
                           
                            <form
                                    method="POST"
                                    action="getChapterS/${paper.id}"
                                  class="col-md-4 "
                                    id="paperForm"
                                >
                                    @csrf
                                    <div
                                        class="card border-0 rounded-3 mx-2 mb-3 d-flex justify-content-between  "
                                    >
                                        <div class="card-body">
                                            <div class="text-center mb-3">
                                                <i
                                                    class="mdi mdi-book-open-page-variant text-danger icon-md"
                                                ></i>
                                            </div>
                                            <div class="text-center">
                                                <h5 class="font-weight-bold text-dark" id="paperName">
                                                    ${paper.name}
                                                </h5>
                                            </div>
                                            <div class="text-center mt-3">
                                               
                                                <button
                                                type="button"
                                                onclick="showModalChapter(${paper.id})"
                                                class="btn btn-dark btn-sm"
                                            >
                                                Enter
                                            </button>

                                            </div>
                                        </div>
                                    </div>
                                </form>
 `
                        );
                    });
                } else {
                    $("#paperDetails").append(
                        '<div class="col-12">No papers found for this subject.</div>'
                    );
                }
            },
            error: function (xhr, status, error) {
                console.error("Error:", error);
            },
        });
        $("#modal").modal("show");
    }

    function showModalChapter(PaperId) {
        $("#paperDetails").empty();
        $("#headerName").text("Chapter");
        $.ajax({
            url: "/getChapterS/" + PaperId,
            method: "GET",
            success: function (response) {
                console.log(typeof response);
                response = JSON.parse(response);
                console.log("Paper ID: " + response);
                // Populate the modal with the response data
                if (response.length > 0) {
                    response.forEach(function (chapter) {
                        console.log(chapter);
                        $("#paperDetails").append(
                            `<div
                            class="col-md-4 " >
                                    
                                    <div
                                        class="card border-0 rounded-3 mx-2 mb-3 d-flex justify-content-between "
                                    >
                                        <div class="card-body">
                                            <div class="text-center mb-3">
                                                <i
                                                    class="mdi mdi-book-open-page-variant text-danger icon-md"
                                                ></i>
                                            </div>
                                            <div class="text-center">
                                                <h5 class="font-weight-bold text-dark" id="paperName">
                                                    ${chapter.name}
                                                </h5>
                                            </div>
                                            <div class="text-center mt-3">
                                                <a
                                                    href="getQuestionS/${chapter.id}"
                                                    class="btn btn-dark btn-sm text-white"
                                                >
                                                   Enter
                                                </a>
                                               

                                            </div>
                                        </div>
                                    </div>
                                </div>`
                        );
                    });
                } else {
                    $("#paperDetails").append(
                        '<div class="col-12">No Chapter found for this Paper.</div>'
                    );
                }
            },
            error: function (xhr, status, error) {
                console.error("Error:", error);
            },
        });
        $("#modal").modal("show");
    }
</script>
@endsection
