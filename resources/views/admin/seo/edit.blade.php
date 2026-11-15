@extends('admin.master')

@section('feature', 'Edit SEO for ' . ucfirst($page))

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
                        <a href="#">Edit SEO for {{ ucfirst($page) }}</a>
                    </li>
                </ul>
            </div>
            <!-- PAGE-HEADER END -->

            <!-- SEO Edit Form -->
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Edit SEO for {{ ucfirst($page) }}</h4>
                </div>
                <div class="card-body">
                    @if(session('success'))
                        <div class="alert alert-success">{{ session('success') }}</div>
                    @endif
                    @if(session('error'))
                        <div class="alert alert-danger">{{ session('error') }}</div>
                    @endif

                    <!-- SEO Edit Form -->
                    <form action="{{ route('seo.update', ['page' => $page]) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="form-group">
                            <label for="meta_title">Meta Title</label>
                            <input type="text" name="meta_title" class="form-control" value="{{ old('meta_title', $seo->meta_title) }}">
                        </div>

                        <div class="form-group">
                            <label for="meta_description">Meta Description</label>
                            <textarea name="meta_description" class="form-control">{{ old('meta_description', $seo->meta_description) }}</textarea>
                        </div>

                        <div class="form-group">
                            <label for="meta_keywords">Meta Keywords</label>
                            <input type="text" name="meta_keywords" class="form-control" value="{{ old('meta_keywords', $seo->meta_keywords) }}">
                        </div>

                        <div class="form-group">
                            <label for="meta_robots">Meta Robots</label>
                            <input type="text" name="meta_robots" class="form-control" value="{{ old('meta_robots', $seo->meta_robots) }}">
                        </div>

                        <button type="submit" class="btn btn-primary">Save Changes</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
