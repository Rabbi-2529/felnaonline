@extends('admin.master')

@section('title', 'Create Why Choose Us')

@section('body')
    <div class="container">
        <div class="page-inner">
            <div class="page-header">
                <h1>Create Why Choose Us Section</h1>
            </div>

            <div class="container-fluid px-4 py-4">
                <form action="{{ route('homepage.store-why-choose-us') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label" for="title">Title</label>
                        <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" value="{{ old('title') }}">
                        @error('title')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label" for="description">Description</label>
                        <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description">{{ old('description') }}</textarea>
                        @error('description')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <button type="submit" class="btn btn-success">Create Section</button>
                </form>
            </div>
        </div>
    </div>
@endsection
