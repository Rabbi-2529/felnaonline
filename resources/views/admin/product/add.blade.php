@extends('admin.master')

@section('feature', 'Add Product')

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
                        <a href="#">Product Module</a>
                    </li>
                    <li class="separator">
                        <i class="icon-arrow-right"></i>
                    </li>
                    <li class="nav-item">
                        <a href="#">Add Product</a>
                    </li>
                </ul>
            </div>
            <!-- PAGE-HEADER END -->
            <div class="container-fluid px-4 py-4">
                <div class="row g-4">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header border-bottom">
                                <h3 class="card-feature">Add Product Form</h3>
                            </div>
                            <div class="card-body">
                                <span class="text-center">@include('notify')</span>
                                <form action="{{ route('product.store') }}" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <div class="mb-3">
                                        <label class="form-label">Product Name</label>
                                        <input type="text" class="form-control" name="name"
                                            value="{{ old('name') }}">
                                        <span
                                            class="text-danger">{{ $errors->has('name') ? $errors->first('name') : '' }}</span>

                                    </div>
                                    <div class="mb-3">
                                        <label for="summernote" class="form-label">Product Description</label>
                                        <textarea name="description" class="form-control summernote" rows="3">{{ old('description') }}</textarea>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Product Image</label>
                                        <input type="file" class="dropify" data-height="150" name="image" />
                                        <span
                                            class="text-danger">{{ $errors->has('image') ? $errors->first('image') : '' }}</span>
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label">Product Price</label>
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
                                    <button type="submit" class="btn btn-primary rounded float-end">Create New
                                        Product</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
