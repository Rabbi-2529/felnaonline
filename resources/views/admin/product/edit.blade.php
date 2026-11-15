@extends('admin.master')

@section('feature', 'Edit Product')

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
                        <a href="#">Product Module</a>
                    </li>
                    <li class="separator">
                        <i class="icon-arrow-right"></i>
                    </li>
                    <li class="nav-item">
                        <a href="#">Edit Product</a>
                    </li>
                </ul>
            </div>
            <!-- PAGE-HEADER END -->
            <div class="container-fluid px-4 py-4">
                <div class="row g-4">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header border-bottom">
                                <h3 class="card-feature">Edit Product Form</h3>
                            </div>
                            <div class="card-body">
                                <form action="{{ route('product.update',$product->id) }}" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                    <div class="mb-3">
                                        <label class="form-label">Product Name</label>
                                        <input type="text" class="form-control" name="name"
                                            value="{{ $product->name }}">
                                        <span
                                            class="text-danger">{{ $errors->has('name') ? $errors->first('name') : '' }}</span>

                                    </div>
                                    <div class="mb-3">
                                        <label for="summernote" class="form-label">Product Description</label>
                                        <textarea name="description" class="form-control summernote" rows="3">{{ $product->description }}</textarea>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Product Image</label>
                                        <input type="file" class="dropify" data-height="200" name="image" />
                                        <img src="{{ asset($product->image) }}" alt="" height="70" width="70" />
                                        <span
                                            class="text-danger">{{ $errors->has('image') ? $errors->first('image') : '' }}</span>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Product Price</label>
                                        <input type="number" class="form-control" name="price"
                                            value="{{ $product->price }}">
                                        <span
                                            class="text-danger">{{ $errors->has('price') ? $errors->first('price') : '' }}</span>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Publication Status</label>
                                        <label class="me-3"><input type="radio" value="1" {{$product->status == 1 ? 'checked' : ''}}
                                                name="status"><span>Published</span></label>
                                        <label><input type="radio" value="0" {{$product->status == 0 ? 'checked' : ''}}
                                                name="status"><span>Unpublished</span></label>
                                    </div>
                                    <button type="submit" class="btn btn-primary rounded float-end">Update Product Info</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
