@extends('admin.master')

@section('title', 'Edit About Section')

@section('body')

    <div class="page-header">
        <div>
            <h1 class="page-title">Edit About Section</h1>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-8 mx-auto">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('about.update', $about->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="mb-3">
                            <label class="form-label">Title</label>
                            <input type="text" class="form-control" name="title" value="{{ old('title', $about->title) }}" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Story</label>
                            <textarea class="form-control" name="story" id="ckeditor-story" rows="5" required>{{ old('story', $about->story) }}</textarea>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Mission</label>
                            <textarea class="form-control" name="mission" id="ckeditor-mission" rows="5" required>{{ old('mission', $about->mission) }}</textarea>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Vision</label>
                            <textarea class="form-control" name="vision" id="ckeditor-vision" rows="5" required>{{ old('vision', $about->vision) }}</textarea>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Image</label>
                            <input type="file" class="form-control" name="image">
                            @if($about->image)
                                <img src="{{ asset($about->image) }}" alt="Current Image" class="mt-2" width="100">
                            @endif
                        </div>
                        <button type="submit" class="btn btn-primary">Update About Section</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('scripts')
    <!-- CKEditor CDN -->
    <script src="https://cdn.ckeditor.com/ckeditor5/36.0.1/classic/ckeditor.js"></script>
    <script>
        // Initialize CKEditor for each textarea
        ClassicEditor
            .create(document.querySelector('#ckeditor-story'))
            .catch(error => {
                console.error(error);
            });

        ClassicEditor
            .create(document.querySelector('#ckeditor-mission'))
            .catch(error => {
                console.error(error);
            });

        ClassicEditor
            .create(document.querySelector('#ckeditor-vision'))
            .catch(error => {
                console.error(error);
            });
    </script>
@endsection
