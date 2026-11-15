@extends('admin.master')

@section('feature', 'Edit Service')

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
                        <a href="#">Service Module</a>
                    </li>
                    <li class="separator">
                        <i class="icon-arrow-right"></i>
                    </li>
                    <li class="nav-item">
                        <a href="#">Edit Service</a>
                    </li>
                </ul>
            </div>
            <!-- PAGE-HEADER END -->

            <div class="container-fluid px-4 py-4">
                <div class="row g-4">
                    <div class="col-md-12">
                        <div class="card shadow-lg border-light">
                            <div class="card-header border-bottom">
                                <h3 class="card-feature mb-0">Edit Service</h3>
                            </div>
                            <div class="card-body">
                                <span class="text-center">@include('notify')</span>
                                <form action="{{ route('services.update', $service->id) }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')

                                    <div class="mb-3">
                                        <label class="form-label" for="service_category_id">Service Category</label>
                                        <select class="form-control" name="service_category_id" id="service_category_id">
                                            @foreach($categories as $category)
                                                <option value="{{ $category->id }}" {{ $category->id == $service->service_category_id ? 'selected' : '' }}>
                                                    {{ $category->title }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label" for="name">Service Name</label>
                                        <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name', $service->name) }}">
                                        @error('name')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
        
                                    <div class="mb-3">
    <label class="form-label" for="description">Description</label>
    <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description">{{ old('description', $service->description) }}</textarea>
    @error('description')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>


                                    <div class="mb-3">
                                        <label class="form-label" for="image">Service Image</label>
                                        <input type="file" class="dropify @error('image') is-invalid @enderror" data-height="150" name="image" id="image" 
                                            data-default-file="{{ $service->image ? asset('storage/' . $service->image) : '' }}" />
                                        @error('image')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                            
                                    <div class="mb-3">
                                        <label class="form-label">Status</label>
                                        <div class="form-check form-check-inline">
                                            <input type="radio" class="form-check-input" value="1" name="status" id="active" {{ old('status', $service->status) == 1 ? 'checked' : '' }}>
                                            <label class="form-check-label" for="active">Active</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input type="radio" class="form-check-input" value="0" name="status" id="inactive" {{ old('status', $service->status) == 0 ? 'checked' : '' }}>
                                            <label class="form-check-label" for="inactive">Inactive</label>
                                        </div>
                                    </div>

                                    <button type="submit" class="btn btn-primary rounded float-end">Update Service</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
