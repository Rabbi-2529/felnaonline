@extends('admin.master')

@section('feature', 'Edit Home Package')

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
                        <a href="#">Home Package Module</a>
                    </li>
                    <li class="separator">
                        <i class="icon-arrow-right"></i>
                    </li>
                    <li class="nav-item">
                        <a href="#">Edit Home Package</a>
                    </li>
                </ul>
            </div>
            <!-- PAGE-HEADER END -->
            <div class="container-fluid px-4 py-4">
                <div class="row g-4">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header border-bottom">
                                <h3 class="card-feature">Edit Home Package Form</h3>
                            </div>
                            <div class="card-body">
                                <form action="{{ route('home_package.update',$home_package->id) }}" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                    <div class="mb-3">
                                        <label class="form-label">Home Package Name</label>
                                        <input type="text" class="form-control" name="name"
                                            value="{{ $home_package->name }}">
                                        <span
                                            class="text-danger">{{ $errors->has('name') ? $errors->first('name') : '' }}</span>

                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Home Package Bandwidth</label>
                                        <input type="text" class="form-control" name="bandwidth"
                                            value="{{ $home_package->bandwidth }}">
                                        <span
                                            class="text-danger">{{ $errors->has('bandwidth') ? $errors->first('bandwidth') : '' }}</span>

                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Feature One</label>
                                        <input type="text" class="form-control" name="feature_one"
                                            value="{{ $home_package->feature_one }}">
                                        <span
                                            class="text-danger">{{ $errors->has('feature_one') ? $errors->first('feature_one') : '' }}</span>

                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Feature Two</label>
                                        <input type="text" class="form-control" name="feature_two"
                                            value="{{ $home_package->feature_two }}">
                                        <span
                                            class="text-danger">{{ $errors->has('feature_two') ? $errors->first('feature_two') : '' }}</span>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Feature Three</label>
                                        <input type="text" class="form-control" name="feature_three"
                                            value="{{ $home_package->feature_three }}">
                                        <span
                                            class="text-danger">{{ $errors->has('feature_three') ? $errors->first('feature_three') : '' }}</span>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Feature Four</label>
                                        <input type="text" class="form-control" name="feature_four"
                                            value="{{ $home_package->feature_four }}">
                                        <span
                                            class="text-danger">{{ $errors->has('feature_four') ? $errors->first('feature_four') : '' }}</span>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Home Package Price</label>
                                        <input type="number" class="form-control" name="price"
                                            value="{{ $home_package->price }}">
                                        <span
                                            class="text-danger">{{ $errors->has('price') ? $errors->first('price') : '' }}</span>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Publication Status</label>
                                        <label class="me-3"><input type="radio" value="1" {{$home_package->status == 1 ? 'checked' : ''}}
                                                name="status"><span>Published</span></label>
                                        <label><input type="radio" value="0" {{$home_package->status == 0 ? 'checked' : ''}}
                                                name="status"><span>Unpublished</span></label>
                                    </div>
                                    <button type="submit" class="btn btn-primary rounded float-end">Update Home Package</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
