@extends('admin.master')

@section('feature', 'Edit Service Category')

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
                        <a href="#">Edit Service Category</a>
                    </li>
                </ul>
            </div>
            <!-- PAGE-HEADER END -->

            <div class="container-fluid px-4 py-4">
                <div class="row g-4">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header border-bottom">
                                <h3 class="card-feature">Edit Service Category Form</h3>
                            </div>
                            <div class="card-body">
                                <span class="text-center">@include('notify')</span>
                                <form action="{{ route('service_categories.update', $category->id) }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    @method('POST')

                                    <div class="mb-3">
                                        <label class="form-label">Category Title</label>
                                        <input type="text" class="form-control" name="title" value="{{ old('title', $category->title) }}">
                                        <span class="text-danger">{{ $errors->first('title') }}</span>
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label">Current Category Image</label>
                                        <br>
                                        <img src="{{ asset($category->image) }}" alt="Category Image" width="100">
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label">New Category Image</label>
                                        <input type="file" class="dropify" data-height="150" name="image" />
                                        <span class="text-danger">{{ $errors->first('image') }}</span>
                                    </div>

                                    <button type="submit" class="btn btn-primary rounded float-end">Update Category</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
