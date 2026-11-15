@extends('admin.master')

@section('feature', 'Create SEO Entry')

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
                    <a href="{{ route('seo.create') }}">Create SEO</a>
                </li>
            </ul>
        </div>
        <!-- PAGE-HEADER END -->

        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Add New SEO Entry</h4>
            </div>
            <div class="card-body">
                <form action="{{ route('seo.store') }}" method="POST">
                    @csrf

                    <div class="form-group">
                        <label for="page">Page Name</label>
                        <select name="page" id="page" class="form-control" required>
                            <option value="">-- Select Page --</option>
                            @foreach (['home', 'about', 'corporate-package', 'feature', 'home-package', 'product', 'service', 'contact'] as $page)
                                <option value="{{ $page }}">{{ ucfirst(str_replace('-', ' ', $page)) }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="meta_title">Meta Title</label>
                        <input type="text" name="meta_title" id="meta_title" class="form-control" placeholder="Enter Meta Title" required>
                    </div>

                    <div class="form-group">
                        <label for="meta_description">Meta Description</label>
                        <textarea name="meta_description" id="meta_description" class="form-control" rows="3" placeholder="Enter Meta Description" required></textarea>
                    </div>

                    <div class="form-group">
                        <label for="meta_keywords">Meta Keywords</label>
                        <input type="text" name="meta_keywords" id="meta_keywords" class="form-control" placeholder="Enter Meta Keywords" required>
                    </div>

                    <div class="form-group">
                        <label for="meta_robots">Meta Robots</label>
                        <input type="text" name="meta_robots" id="meta_robots" class="form-control" placeholder="e.g. index, follow" required>
                    </div>

                    <button type="submit" class="btn btn-success">Create</button>
                    <a href="{{ route('seo') }}" class="btn btn-secondary">Cancel</a>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
