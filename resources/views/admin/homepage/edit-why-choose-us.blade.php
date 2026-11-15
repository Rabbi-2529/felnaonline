@extends('admin.master')

@section('title', 'Edit Why Choose Us')

@section('body')
    <div class="container">
        <div class="page-inner">
            <div class="page-header">
                <h1>Edit Why Choose Us Section</h1>
            </div>

            <div class="container-fluid px-4 py-4">
                <form action="{{ route('homepage.update-why-choose-us', $whyChooseUs->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label class="form-label" for="title">Title</label>
                        <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" value="{{ old('title', $whyChooseUs->title) }}">
                        @error('title')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label" for="description">Description</label>
                        <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description">{{ old('description', $whyChooseUs->description) }}</textarea>
                        @error('description')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <button type="submit" class="btn btn-success">Update Section</button>
                </form>
            </div>
        </div>
    </div>
@endsection
