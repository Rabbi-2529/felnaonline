@extends('admin.master')

@section('title', 'Edit Team Member')

@section('body')

    <div class="page-header">
        <div>
            <h1 class="page-title">Edit Team Member</h1>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-8 mx-auto">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('team.update', $team->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <label class="form-label">Name</label>
                            <input type="text" class="form-control" name="name" value="{{ $team->name }}" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Designation</label>
                            <input type="text" class="form-control" name="designation" value="{{ $team->designation }}" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Image</label>
                            <input type="file" class="form-control" name="image">
                            <img src="{{ asset('storage/' . $team->image) }}" width="50" height="50" class="mt-2">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Facebook Link</label>
                            <input type="url" class="form-control" name="facebook_link" value="{{ $team->facebook_link }}">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">LinkedIn Link</label>
                            <input type="url" class="form-control" name="linkedin_link" value="{{ $team->linkedin_link }}">
                        </div>
                        <button type="submit" class="btn btn-primary">Update Team Member</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
