@extends('admin.master')

@section('feature', 'Manage Corporate Package')

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
                        <a href="#">Manage Corporate Package</a>
                    </li>
                </ul>
            </div>
            <!-- PAGE-HEADER END -->
            <div class="row row-sm">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header border-bottom">
                            <h3 class="card-title">Manage Corporate Package Table</h3>
                        </div>
                        <div class="card-body">
                            <span class="text-center">@include('notify')</span>
                            <div class="table-responsive">
                                <table class="table table-bordered text-nowrap border-bottom" id="basic-datatables">
                                    <thead>
                                        <tr class="text-center">
                                            <th scope="col">Sl No</th>
                                            <th scope="col">Name</th>
                                            <th scope="col">Bandwidth</th>
                                            <th scope="col">Price</th>
                                            <th scope="col">Status</th>
                                            <th scope="col">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($corporate_packages as $corporate_package)
                                            <tr class="text-center">
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $corporate_package->name }}</td>
                                                <td>{{ $corporate_package->bandwidth }}</td>
                                                <td>{{ $corporate_package->price }}</td>
                                                <td>{{ $corporate_package->status == 1 ? 'Published' : 'Unpublished' }}</td>
                                                <td>
                                                    <div class="d-flex gap-2 justify-content-center">
                                                        <a href="{{ route('corporate_package.show', $corporate_package->id) }}"
                                                            class="btn btn-sm btn-outline-info"><i
                                                                class="fa fa-eye"></i></a>
                                                        <a href="{{ route('corporate_package.edit', $corporate_package->id) }}"
                                                            class="btn btn-sm btn-outline-success"><i
                                                                class="fa fa-edit"></i></a>
                                                        <form
                                                            action="{{ route('corporate_package.destroy', $corporate_package->id) }}"
                                                            method="POST">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="btn btn-sm btn-outline-danger">
                                                                <i class="fa fa-trash"></i></button>
                                                        </form>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
