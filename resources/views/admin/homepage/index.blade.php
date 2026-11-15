@extends('admin.master')

@section('title', 'Homepage Management')

@section('body')
    <div class="container">
        <div class="page-inner">
            <div class="page-header">
                <h1>Homepage Management</h1>
            </div>
            
            <div class="container-fluid px-4 py-4">
                <!-- Why Choose Us List -->
                <div class="row g-4">
                    <div class="col-md-6">
                        <div class="card shadow-lg">
                            <div class="card-header">
                                <h3 class="mb-0">Why Choose Us</h3>
                            </div>
                            <div class="card-body">
                       @if ($whyChooseUs->isEmpty())
                <a href="{{ route('homepage.create-why-choose-us') }}" class="btn btn-primary mb-3">Add New</a>
            @endif
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Title</th>
                                            <th>Description</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($whyChooseUs as $section)
                                            <tr>
                                                <td>{{ $section->title }}</td>
                                     <td>{{ \Illuminate\Support\Str::limit($section->description, 50) }}</td>

                                                <td>
                                                    <a href="{{ route('homepage.edit-why-choose-us', $section->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                                    <form action="{{ route('homepage.delete-why-choose-us', $section->id) }}" method="POST" style="display: inline;">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                    <!-- Key Points List -->
                    <div class="col-md-6">
                        <div class="card shadow-lg">
                            <div class="card-header">
                                <h3 class="mb-0">Key Points</h3>
                            </div>
                            <div class="card-body">
                                <a href="{{ route('homepage.create-key-point') }}" class="btn btn-primary mb-3">Add New</a>
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Icon</th>
                                            <th>Title</th>
                                            <th>Description</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($keyPoints as $point)
                                            <tr>
                                                <td><i class="{{ $point->icon }}"></i></td>
                                                <td>{{ $point->title }}</td>
                         <td>{{ \Illuminate\Support\Str::limit($point->description, 50) }}</td>
                                                <td>
                                                    <a href="{{ route('homepage.edit-key-point', $point->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                                    <form action="{{ route('homepage.delete-key-point', $point->id) }}" method="POST" style="display: inline;">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger btn-sm">Delete</button>
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
            </div>
        </div>
    </div>
@endsection
