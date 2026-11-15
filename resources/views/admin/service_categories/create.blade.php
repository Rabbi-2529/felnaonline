@extends('admin.master')

@section('feature', 'Add Service Category')

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
                        <a href="#">Service Category Module</a>
                    </li>
                    <li class="separator">
                        <i class="icon-arrow-right"></i>
                    </li>
                    <li class="nav-item">
                        <a href="#">Add Service Category</a>
                    </li>
                </ul>
            </div>
            <!-- PAGE-HEADER END -->

            <div class="container-fluid px-4 py-4">
                <div class="row g-4">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header border-bottom">
                                <h3 class="card-feature">Add Service Category Form</h3>
                            </div>
                            <div class="card-body">
                                <span class="text-center">@include('notify')</span>
                                <form action="{{ route('service_categories.store') }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="mb-3">
                                        <label class="form-label">Category Title</label>
                                        <input type="text" class="form-control" name="title" value="{{ old('title') }}">
                                        <span class="text-danger">{{ $errors->first('title') }}</span>
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label">Category Image</label>
                                        <input type="file" class="dropify" data-height="150" name="image" />
                                        <span class="text-danger">{{ $errors->first('image') }}</span>
                                    </div>

                                    <button type="submit" class="btn btn-primary rounded float-end">Create New Category</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
