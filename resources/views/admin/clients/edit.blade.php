@extends('admin.master')

@section('feature', 'Edit Client')

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
                    <a href="#">Client Module</a>
                </li>
                <li class="separator">
                    <i class="icon-arrow-right"></i>
                </li>
                <li class="nav-item">
                    <a href="#">Edit Client</a>
                </li>
            </ul>
        </div>
        <!-- PAGE-HEADER END -->

        <div class="container-fluid px-4 py-4">
            <div class="row g-4">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header border-bottom">
                            <h3 class="card-feature">Edit Client</h3>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('clients.update', $client->id) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')

                                <div class="mb-3">
                                    <label class="form-label">Client Name</label>
                                    <input type="text" class="form-control" name="name" value="{{ old('name', $client->name) }}">
                                    <span class="text-danger">{{ $errors->has('name') ? $errors->first('name') : '' }}</span>
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">Designation</label>
                                    <input type="text" class="form-control" name="designation" value="{{ old('designation', $client->designation) }}">
                                    <span class="text-danger">{{ $errors->has('designation') ? $errors->first('designation') : '' }}</span>
                                </div>

                                <div class="mb-3">
                                    <label for="summernote" class="form-label">Description</label>
                                    <textarea name="description" class="form-control summernote" rows="3">{{ old('description', $client->description) }}</textarea>
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">Client Image</label>
                                    <input type="file" class="dropify" data-height="150" name="image" />
                                    <span class="text-danger">{{ $errors->has('image') ? $errors->first('image') : '' }}</span>
                                    <img src="{{ asset($client->image) }}" width="150" alt="{{ $client->name }}" class="mt-3">
                                </div>

                                <button type="submit" class="btn btn-primary rounded float-end">Update Client</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
