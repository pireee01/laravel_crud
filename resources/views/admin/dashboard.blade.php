@extends('layouts.master')
@section('title')
    Dashboard Admin
@endsection
@section('body')

<body data-sidebar="dark">
    @endsection
    @section('content')

    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h1>Admin Dashboard</h1>
                </div>
            </div>
        </div>
    </div>

    @endsection
    @section('script')
    <!-- apexcharts -->
    <script src="{{ URL::asset('/assets/libs/apexcharts/apexcharts.min.js') }}"></script>
    <script src="{{ URL::asset('/assets/js/pages/dashboard.init.js') }}"></script>
    @endsection