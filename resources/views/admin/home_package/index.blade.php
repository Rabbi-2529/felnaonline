@extends('admin.master')

@section('feature', 'Manage Home Package')

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
                        <a href="#">Manage Home Package</a>
                    </li>
                </ul>
            </div>
            <!-- PAGE-HEADER END -->
            <div class="row row-sm">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header border-bottom">
                            <h3 class="card-title">Manage Home Package Table</h3>
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
                                        @foreach ($home_packages as $home_package)
                                            <tr class="text-center">
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $home_package->name }}</td>
                                                <td>{{ $home_package->bandwidth }}</td>
                                                <td>{{ $home_package->price }}</td>
                                                <td>{{ $home_package->status == 1 ? 'Published' : 'Unpublished' }}</td>
                                                <td>
                                                    <div class="d-flex gap-2 justify-content-center">
                                                        <a href="{{ route('home_package.show', $home_package->id) }}"
                                                            class="btn btn-sm btn-outline-info"><i
                                                                class="fa fa-eye"></i></a>
                                                        <a href="{{ route('home_package.edit', $home_package->id) }}"
                                                            class="btn btn-sm btn-outline-success"><i
                                                                class="fa fa-edit"></i></a>
                                                        <form
                                                            action="{{ route('home_package.destroy', $home_package->id) }}"
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

