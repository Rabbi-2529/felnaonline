@extends('admin.master')

@section('title', 'Add Team Member')

@section('body')
  <br>
    <br>  <br>

    <br>

    <div class="row">
        <div class="col-lg-8 mx-auto">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('team.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        
                        <!-- Display Validation Errors -->
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <!-- Name -->
                        <div class="mb-3">
                            <label class="form-label" for="name">Name</label>
                            <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}" required>
                        </div>

                        <!-- Designation -->
                        <div class="mb-3">
                            <label class="form-label" for="designation">Designation</label>
                            <input type="text" class="form-control" id="designation" name="designation" value="{{ old('designation') }}" required>
                        </div>

                        <!-- Image -->
                        <div class="mb-3">
                            <label class="form-label" for="image">Image</label>
                            <input type="file" class="form-control" id="image" name="image" required>
                        </div>

                        <!-- Facebook Link -->
                        <div class="mb-3">
                            <label class="form-label" for="facebook_link">Facebook Link</label>
                            <input type="url" class="form-control" id="facebook_link" name="facebook_link" value="{{ old('facebook_link') }}">
                        </div>

                        <!-- LinkedIn Link -->
                        <div class="mb-3">
                            <label class="form-label" for="linkedin_link">LinkedIn Link</label>
                            <input type="url" class="form-control" id="linkedin_link" name="linkedin_link" value="{{ old('linkedin_link') }}">
                        </div>

                        <!-- Submit Button -->
                        <button type="submit" class="btn btn-success">Add Team Member</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
