@extends('admin.master')

@section('feature', 'Add Slider')

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
                        <a href="#">Slider Module</a>
                    </li>
                    <li class="separator">
                        <i class="icon-arrow-right"></i>
                    </li>
                    <li class="nav-item">
                        <a href="#">Add Slider</a>
                    </li>
                </ul>
            </div>
            <!-- PAGE-HEADER END -->
            <div class="container-fluid px-4 py-4">
                <div class="row g-4">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header border-bottom">
                                <h3 class="card-feature">Add Slider Form</h3>
                            </div>
                            <div class="card-body">
                                <span class="text-center">@include('notify')</span>
                                <form action="{{ route('slider.store') }}" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <div class="mb-3">
                                        <label class="form-label">Slider Title</label>
                                        <input type="text" class="form-control" name="title"
                                            value="{{ old('title') }}">
                                        <span
                                            class="text-danger">{{ $errors->has('title') ? $errors->first('title') : '' }}</span>

                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Slider Subtitle</label>
                                        <input type="text" class="form-control" name="subtitle"
                                            value="{{ old('subtitle') }}">
                                        <span
                                            class="text-danger">{{ $errors->has('subtitle') ? $errors->first('subtitle') : '' }}</span>

                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Slider Image</label>
                                        <input type="file" class="dropify" data-height="150" name="image" />
                                        <span
                                            class="text-danger">{{ $errors->has('image') ? $errors->first('image') : '' }}</span>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Publication Status</label>
                                        <label class="me-3"><input type="radio" value="1" checked
                                                name="status"><span>Published</span></label>
                                        <label><input type="radio" value="0"
                                                name="status"><span>Unpublished</span></label>
                                    </div>
                                    <button type="submit" class="btn btn-primary rounded float-end">Create New
                                        Slider</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
