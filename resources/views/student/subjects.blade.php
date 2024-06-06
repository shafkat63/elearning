<!-- @extends('layout.stu_public')

@section('nav')
    @include('layout.st_nav')
@endsection

@section('content')
    <!-- partial -->
<div class="main-panel">
    <div class="content-wrapper container-fluid">
        <div class="col-md-12">
            @foreach($papers as $data)
            <div class="col-md-12 grid-margin stretch-card">
                <div class="card ">
                    <div class="card-body ">
                        <h4 class="card-title">{{ $data->name }}</h4>
                        <div class="row">
                            <div class="col-4">
                                <ul
                                    class="nav nav-tabs nav-tabs-vertical "
                                    role="tablist"
                                >
                                    @php $firstTab = true; @endphp
                                    @foreach($chapter as $datas)
                                    @if($datas->paper_id == $data->id)
                                    <li class="nav-item">
                                        <a
                                            class="nav-link @if($firstTab) active @endif"
                                            id="tab-{{ $datas->id }}"
                                            data-bs-toggle="tab"
                                            href="#content-{{ $datas->id }}"
                                            role="tab"
                                            aria-controls="content-{{ $datas->id }}"
                                            aria-selected="true"
                                        >
                                            {{ $datas->name }}
                                            <i
                                                class="mdi mdi-close-network text-info ms-2"
                                            ></i>
                                        </a>
                                    </li>
                                    @php $firstTab = false; @endphp @endif
                                    @endforeach
                                </ul>
                            </div>
                            <div class="col-8">
                                <div class="tab-content tab-content-vertical">
                                    @php $firstContent = true; @endphp
                                    @foreach($chapter as $datas)
                                    @if($datas->paper_id == $data->id)
                                    <div
                                        class="tab-pane fade @if($firstContent) show active @endif"
                                        id="content-{{ $datas->id }}"
                                        role="tabpanel"
                                        aria-labelledby="tab-{{ $datas->id }}"
                                    >
                                        @foreach($questions as $question)
                                        @if($question->chapter_id == $datas->id)
                                        <div class="text-center">
                                            <p>
                                                {{ $question->question_name }}
                                            </p>
                                            <hr class="my-4" />
                                        </div>
                                        @endif @endforeach
                                    </div>
                                    @php $firstContent = false; @endphp @endif
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
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
