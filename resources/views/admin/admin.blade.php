@extends('admin.layouts.app')
@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Dashboard</h1>
        </div>

        <div class="section-body">
            <div class="row">
                <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                    <div class="card card-statistic-1">
                        <div class="card-icon bg-info"
                            style="background-color: #84b6f4 !important">
                            <i class="fas fa-user"></i>
                        </div>
                        <div class="card-header">
                            <h4>Admin</h4>
                        </div>
                        <div class="card-body">
                            {{ $admin }}
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                    <div class="card card-statistic-1">
                        <div class="card-icon bg-danger"
                            style="background-color: #ff6961 !important">
                            <i class="fas fa-users"></i>
                        </div>
                        <div class="card-header">
                            <h4>Users</h4>
                        </div>
                        <div class="card-body">
                            {{ $users }}
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                    <div class="card card-statistic-1">
                        <div class="card-icon bg-warning"
                            style="background-color: #daa556 !important">
                            <i class="fas fa-book"></i>
                        </div>
                        <div class="card-header">
                            <h4>Books</h4>
                        </div>
                        <div class="card-body">
                            {{ $books }}
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                    <div class="card card-statistic-1">
                        <div class="card-icon bg-success"
                            style="background-color: #77dd77 !important">
                            <i class="fas fa-list"></i>
                        </div>
                        <div class="card-header">
                            <h4>Categories</h4>
                        </div>
                        <div class="card-body">
                            {{ $categories }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@push('customStyle')
    <style>
        .card-statistic-1 {
            background-color: #F3F2EC !important;
        }
        .card-header h4 {
            color: #6c757d !important;
        }
    </style>
@endpush