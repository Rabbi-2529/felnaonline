@extends('admin.master')

@section('feature', 'Home Package Details')

@section('body')

    <div class="container">
        <div class="page-inner">
            <!-- PAGE-HEADER -->
            <div class="page-header">
                <ul class="breadcrumbs mb-3">
                    <li class="nav-home">
                        <a href="{{ route('admin.dashboard') }}">
                            <i class="icon-home"></i>
                        </a>
                    </li>
                    <li class="separator">
                        <i class="icon-arrow-right"></i>
                    </li>
                    <li class="nav-item">
                        <a href="#">Home Package Module</a>
                    </li>
                    <li class="separator">
                        <i class="icon-arrow-right"></i>
                    </li>
                    <li class="nav-item">
                        <a href="#">Home Package Details</a>
                    </li>
                </ul>
            </div>
            <!-- PAGE-HEADER END -->

            <div class="container-fluid px-4 py-4">
                <div class="row g-4">
                    <div class="col-md-10 offset-md-1">
                        <div class="card">
                            <div class="card-header border-bottom">
                                <h3 class="card-title">Home Package Details</h3>
                            </div>
                            <div class="card-body">
                                <table class="table table-bordered table-hover">
                                    <tr>
                                        <th>Home Package ID</th>
                                        <td>{{ $home_package->id }}</td>
                                    </tr>
                                    <tr>
                                        <th>Home Package Name</th>
                                        <td>{{ $home_package->name }}</td>
                                    </tr>
                                    <tr>
                                        <th>Home Package Bandwidth</th>
                                        <td>{{ $home_package->bandwidth }}</td>
                                    </tr>
                                    <tr>
                                        <th>Feature One</th>
                                        <td>{{ $home_package->feature_one }}</td>
                                    </tr>
                                    <tr>
                                        <th>Feature Two</th>
                                        <td>{{ $home_package->feature_two }}</td>
                                    </tr>
                                    <tr>
                                        <th>Feature Three</th>
                                        <td>{{ $home_package->feature_three }}</td>
                                    </tr>
                                    <tr>
                                        <th>Feature Four</th>
                                        <td>{{ $home_package->feature_four }}</td>
                                    </tr>
                                    <tr>
                                        <th>Home Package Price</th>
                                        <td>{{ $home_package->price }}</td>
                                    </tr>
                                    <tr>
                                        <th>Publication Status</th>
                                        <td>{{ $home_package->status == 1 ? 'Published' : 'Not Published' }}</td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
