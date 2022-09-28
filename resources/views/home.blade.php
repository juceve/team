@extends('layouts.app')

@section('title-page')
@endsection

@section('title-content')
    Inicio
@endsection

@section('content')
    <div class="row">
        <!-- Column -->
        <div class="col-md-6 col-lg-3">
            <div class="card card-hover">
                <div class="box bg-cyan text-center">
                    <h1 class="font-light text-white">
                        <i class="mdi mdi-view-dashboard"></i>
                    </h1>
                    <h6 class="text-white">Dashboard</h6>
                </div>
            </div>
        </div>
        <!-- Column -->
        <div class="col-md-6 col-lg-3">
            <div class="card card-hover">
                <div class="box bg-success text-center">
                    <h1 class="font-light text-white">
                        <i class="mdi mdi-chart-areaspline"></i>
                    </h1>
                    <h6 class="text-white">Charts</h6>
                </div>
            </div>
        </div>
        <!-- Column -->
        <div class="col-md-6 col-lg-3">
            <div class="card card-hover">
                <div class="box bg-warning text-center">
                    <h1 class="font-light text-white">
                        <i class="mdi mdi-collage"></i>
                    </h1>
                    <h6 class="text-white">Widgets</h6>
                </div>
            </div>
        </div>
        <!-- Column -->
        <div class="col-md-6 col-lg-3">
            <div class="card card-hover">
                <div class="box bg-danger text-center">
                    <h1 class="font-light text-white">
                        <i class="mdi mdi-border-outside"></i>
                    </h1>
                    <h6 class="text-white">Tables</h6>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Latest Posts</h4>
                </div>
                <div class="comment-widgets scrollable">
                    <!-- Comment Row -->
                    <div class="d-flex flex-row comment-row mt-0">
                        <div class="p-2">
                            <img src="{{asset('admin/assets/images/users/1.jpg')}}" alt="user" width="50" class="rounded-circle" />
                        </div>
                        <div class="comment-text w-100">
                            <h6 class="font-medium">James Anderson</h6>
                            <span class="mb-3 d-block">Lorem Ipsum is simply dummy text of the printing and
                                type setting industry.
                            </span>
                            <div class="comment-footer">
                                <span class="text-muted float-end">April 14, 2021</span>
                                <button type="button" class="btn btn-cyan btn-sm text-white">
                                    Edit
                                </button>
                                <button type="button" class="btn btn-success btn-sm text-white">
                                    Publish
                                </button>
                                <button type="button" class="btn btn-danger btn-sm text-white">
                                    Delete
                                </button>
                            </div>
                        </div>
                    </div>
                    <!-- Comment Row -->
                    <div class="d-flex flex-row comment-row">
                        <div class="p-2">
                            <img src="{{asset('admin/assets/images/users/4.jpg')}}" alt="user" width="50" class="rounded-circle" />
                        </div>
                        <div class="comment-text active w-100">
                            <h6 class="font-medium">Michael Jorden</h6>
                            <span class="mb-3 d-block">Lorem Ipsum is simply dummy text of the printing and
                                type setting industry.
                            </span>
                            <div class="comment-footer">
                                <span class="text-muted float-end">May 10, 2021</span>
                                <button type="button" class="btn btn-cyan btn-sm text-white">
                                    Edit
                                </button>
                                <button type="button" class="btn btn-success btn-sm text-white">
                                    Publish
                                </button>
                                <button type="button" class="btn btn-danger btn-sm text-white">
                                    Delete
                                </button>
                            </div>
                        </div>
                    </div>
                    <!-- Comment Row -->
                    <div class="d-flex flex-row comment-row">
                        <div class="p-2">
                            <img src="{{asset('admin/assets/images/users/5.jpg')}}" alt="user" width="50" class="rounded-circle" />
                        </div>
                        <div class="comment-text w-100">
                            <h6 class="font-medium">Johnathan Doeting</h6>
                            <span class="mb-3 d-block">Lorem Ipsum is simply dummy text of the printing and
                                type setting industry.
                            </span>
                            <div class="comment-footer">
                                <span class="text-muted float-end">August 1, 2021</span>
                                <button type="button" class="btn btn-cyan btn-sm text-white">
                                    Edit
                                </button>
                                <button type="button" class="btn btn-success btn-sm text-white">
                                    Publish
                                </button>
                                <button type="button" class="btn btn-danger btn-sm text-white">
                                    Delete
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Card -->
            
        </div>
        <div class="col-md-6">
            <!-- card -->
            
            <!-- card new -->
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title mb-0">News Updates</h4>
                </div>
                <ul class="list-style-none">
                    <li class="d-flex no-block card-body">
                        <i class="mdi mdi-check-circle fs-4 w-30px mt-1"></i>
                        <div>
                            <a href="#" class="mb-0 font-medium p-0">Lorem ipsum dolor sit amet, consectetur
                                adipiscing
                                elit.</a>
                            <span class="text-muted">dolor sit amet, consectetur adipiscing</span>
                        </div>
                        <div class="ms-auto">
                            <div class="tetx-right">
                                <h5 class="text-muted mb-0">20</h5>
                                <span class="text-muted font-16">Jan</span>
                            </div>
                        </div>
                    </li>
                    <li class="d-flex no-block card-body border-top">
                        <i class="mdi mdi-gift fs-4 w-30px mt-1"></i>
                        <div>
                            <a href="#" class="mb-0 font-medium p-0">Congratulation Maruti, Happy Birthday</a>
                            <span class="text-muted">many many happy returns of the day</span>
                        </div>
                        <div class="ms-auto">
                            <div class="tetx-right">
                                <h5 class="text-muted mb-0">11</h5>
                                <span class="text-muted font-16">Jan</span>
                            </div>
                        </div>
                    </li>
                    <li class="d-flex no-block card-body border-top">
                        <i class="mdi mdi-plus fs-4 w-30px mt-1"></i>
                        <div>
                            <a href="#" class="mb-0 font-medium p-0">Maruti is a Responsive Admin theme</a>
                            <span class="text-muted">But already everything was solved. It will ...</span>
                        </div>
                        <div class="ms-auto">
                            <div class="tetx-right">
                                <h5 class="text-muted mb-0">19</h5>
                                <span class="text-muted font-16">Jan</span>
                            </div>
                        </div>
                    </li>
                    <li class="d-flex no-block card-body border-top">
                        <i class="mdi mdi-leaf fs-4 w-30px mt-1"></i>
                        <div>
                            <a href="#" class="mb-0 font-medium p-0">Envato approved Maruti Admin template</a>
                            <span class="text-muted">i am very happy to approved by TF</span>
                        </div>
                        <div class="ms-auto">
                            <div class="tetx-right">
                                <h5 class="text-muted mb-0">20</h5>
                                <span class="text-muted font-16">Jan</span>
                            </div>
                        </div>
                    </li>
                    <li class="d-flex no-block card-body border-top">
                        <i class="mdi mdi-comment-question-outline fs-4 w-30px mt-1"></i>
                        <div>
                            <a href="#" class="mb-0 font-medium p-0">
                                I am alwayse here if you have any question</a>
                            <span class="text-muted">we glad that you choose our template</span>
                        </div>
                        <div class="ms-auto">
                            <div class="tetx-right">
                                <h5 class="text-muted mb-0">15</h5>
                                <span class="text-muted font-16">Jan</span>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
@endsection
@section('css')
<link
href="{{asset('admin/assets/libs/fullcalendar/dist/fullcalendar.min.css')}}"
rel="stylesheet"
/>
<link href="{{asset('admin/assets/extra-libs/calendar/calendar.css')}}" rel="stylesheet" />
@endsection
@section('js')
<script src="{{asset('admin/assets/libs/moment/min/moment.min.js')}}"></script>
<script src="{{asset('admin/assets/libs/fullcalendar/dist/fullcalendar.min.js')}}"></script>
<script src="{{asset('admin/dist/js/pages/calendar/cal-init.js')}}></script>
@endsection