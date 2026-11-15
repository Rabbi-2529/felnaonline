@extends('admin.master')

@section('feature', 'Add Corporate Package')

@section('body')

    <div class="container">
        <div class="page-inner">
            <!-- PAGE-HEADER -->
            <div class="page-header">
                <ul class="breadcrumbs mb-3">
                    <li class="nav-home">
                        <a href="{{route('admin.dashboard')}}">
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
                        <a href="#">Add Corporate Package</a>
                    </li>
                </ul>
            </div>
            <!-- PAGE-HEADER END -->
            <div class="container-fluid px-4 py-4">
                <div class="row g-4">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header border-bottom">
                                <h3 class="card-feature">Add Corporate Package Form</h3>
                            </div>
                            <div class="card-body">
                                <span class="text-center">@include('notify')</span>
                                <form action="{{ route('corporate_package.store') }}" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <div class="mb-3">
                                        <label class="form-label">Corporate Package Name</label>
                                        <input type="text" class="form-control" name="name"
                                            value="{{ old('name') }}">
                                        <span
                                            class="text-danger">{{ $errors->has('name') ? $errors->first('name') : '' }}</span>

                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Corporate Package Bandwidth</label>
                                        <input type="text" class="form-control" name="bandwidth"
                                            value="{{ old('bandwidth') }}">
                                        <span
                                            class="text-danger">{{ $errors->has('bandwidth') ? $errors->first('bandwidth') : '' }}</span>

                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Feature One</label>
                                        <input type="text" class="form-control" name="feature_one"
                                            value="{{ old('feature_one') }}">
                                        <span
                                            class="text-danger">{{ $errors->has('feature_one') ? $errors->first('feature_one') : '' }}</span>

                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Feature Two</label>
                                        <input type="text" class="form-control" name="feature_two"
                                            value="{{ old('feature_two') }}">
                                        <span
                                            class="text-danger">{{ $errors->has('feature_two') ? $errors->first('feature_two') : '' }}</span>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Feature Three</label>
                                        <input type="text" class="form-control" name="feature_three"
                                            value="{{ old('feature_three') }}">
                                        <span
                                            class="text-danger">{{ $errors->has('feature_three') ? $errors->first('feature_three') : '' }}</span>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Feature Four</label>
                                        <input type="text" class="form-control" name="feature_four"
                                            value="{{ old('feature_four') }}">
                                        <span
                                            class="text-danger">{{ $errors->has('feature_four') ? $errors->first('feature_four') : '' }}</span>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Corporate Package Price</label>
                                        <input type="number" class="form-control" name="price"
                                            value="{{ old('price') }}">
                                        <span
                                            class="text-danger">{{ $errors->has('price') ? $errors->first('price') : '' }}</span>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Publication Status</label>
                                        <label class="me-3"><input type="radio" value="1" checked
                                                name="status"><span>Published</span></label>
                                        <label><input type="radio" value="0"
                                                name="status"><span>Unpublished</span></label>
                                    </div>
                                    <button type="submit" class="btn btn-primary rounded float-end">Create New Corporate Package</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
