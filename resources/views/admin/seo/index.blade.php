@extends('admin.master')

@section('feature', 'SEO Management')

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
                        <a href="#">SEO Module</a>
                    </li>
                    <li class="separator">
                        <i class="icon-arrow-right"></i>
                    </li>
                    <li class="nav-item">
                        <a href="#">All SEO Pages</a>
                    </li>
                </ul>
            </div>
            <!-- PAGE-HEADER END -->

            <!-- Main content for SEO Management -->
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Manage SEO Pages</h4>
                    <a href="{{ route('seo.edit', ['page' => 'about']) }}" class="btn btn-primary float-right">Add/Manage SEO for About Page</a>
                </div>
                <div class="card-body">
                    @if(session('success'))
                        <div class="alert alert-success">{{ session('success') }}</div>
                    @endif
                    @if(session('error'))
                        <div class="alert alert-danger">{{ session('error') }}</div>
                    @endif

                    <!-- SEO Pages Table -->
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Page</th>
                                <th>Meta Title</th>
                                <th>Meta Description</th>
                                <th>Meta Keywords</th>
                                <th>Meta Robots</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($seos as $seo)
                            <tr>
                                <td>{{ ucfirst($seo->page) }}</td>
                                <td>{{ $seo->meta_title }}</td>
                                <td>{{ $seo->meta_description }}</td>
                                <td>{{ $seo->meta_keywords }}</td>
                                <td>{{ $seo->meta_robots }}</td>
                                <td>
                                    <a href="{{ route('seo.edit', ['page' => $seo->page]) }}" class="btn btn-warning btn-sm">Edit</a>
                                    <form action="{{ route('seo.delete', ['page' => $seo->page]) }}" method="POST" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this SEO data?')">Delete</button>
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
