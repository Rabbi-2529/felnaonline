@extends('admin.master')

@section('title', 'Manage About Sections')

@section('body')

    <div class="page-header">
        <div>
            <h1 class="page-title">About Sections</h1>
            <a href="{{ route('about.create') }}" class="btn btn-success">Create New About Section</a>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    @if(session('msg'))
                        <div class="alert alert-success">{{ session('msg') }}</div>
                    @endif
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Title</th>
                                <th>Story</th>
                                <th>Mission</th>
                                <th>Vision</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($abouts as $about)
                                <tr>
                                    <td>{{ $about->title }}</td>
                                    <td>{{ Str::limit($about->story, 50) }}</td>
                                    <td>{{ Str::limit($about->mission, 50) }}</td>
                                    <td>{{ Str::limit($about->vision, 50) }}</td>
                                    <td>
                                        <a href="{{ route('about.edit', $about->id) }}" class="btn btn-primary">Edit</a>
                                        <form action="{{ route('about.destroy', $about->id) }}" method="POST" style="display:inline;" onsubmit="return confirm('Are you sure you want to delete this?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

@endsection
