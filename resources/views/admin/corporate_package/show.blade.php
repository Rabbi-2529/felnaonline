@extends('admin.master')

@section('feature', 'Corporate Package Details')

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
                        <a href="#">Corporate Package Module</a>
                    </li>
                    <li class="separator">
                        <i class="icon-arrow-right"></i>
                    </li>
                    <li class="nav-item">
                        <a href="#">Corporate Package Details</a>
                    </li>
                </ul>
            </div>
            <!-- PAGE-HEADER END -->

            <div class="container-fluid px-4 py-4">
                <div class="row g-4">
                    <div class="col-md-10 offset-md-1">
                        <div class="card">
                            <div class="card-header border-bottom">
                                <h3 class="card-title">Corporate Package Details</h3>
                            </div>
                            <div class="card-body">
                                <table class="table table-bordered table-hover">
                                    <tr>
                                        <th>Corporate Package ID</th>
                                        <td>{{ $corporate_package->id }}</td>
                                    </tr>
                                    <tr>
                                        <th>Corporate Package Name</th>
                                        <td>{{ $corporate_package->name }}</td>
                                    </tr>
                                    <tr>
                                        <th>Corporate Package Bandwidth</th>
                                        <td>{{ $corporate_package->bandwidth }}</td>
                                    </tr>
                                    <tr>
                                        <th>Feature One</th>
                                        <td>{{ $corporate_package->feature_one }}</td>
                                    </tr>
                                    <tr>
                                        <th>Feature Two</th>
                                        <td>{{ $corporate_package->feature_two }}</td>
                                    </tr>
                                    <tr>
                                        <th>Feature Three</th>
                                        <td>{{ $corporate_package->feature_three }}</td>
                                    </tr>
                                    <tr>
                                        <th>Feature Four</th>
                                        <td>{{ $corporate_package->feature_four }}</td>
                                    </tr>
                                    <tr>
                                        <th>Corporate Package Price</th>
                                        <td>{{ $corporate_package->price }}</td>
                                    </tr>
                                    <tr>
                                        <th>Publication Status</th>
                                        <td>{{ $corporate_package->status == 1 ? 'Published' : 'Not Published' }}</td>
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
