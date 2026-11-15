@extends('admin.master')

@section('title', 'Manage Team')

@section('body')

    <!-- PAGE-HEADER -->
    <div class="page-header">
        <div>
            <h1 class="page-title">Team Module</h1>
        </div>
        <div class="ms-auto pageheader-btn">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0);">Team</a></li>
                <li class="breadcrumb-item active" aria-current="page">Manage Team</li>
            </ol>
        </div>
    </div>
    <!-- PAGE-HEADER END -->

    <div class="row row-sm">
        <div class="col-12">
            <div class="card">
                <div class="card-header border-bottom">
                    <h3 class="card-title">Manage Team Table</h3>
                    <a href="{{ route('team.create') }}" class="btn btn-primary float-end">Add Team Member</a>
                </div>
                <div class="card-body">
                    @if (session('success'))
                        <div class="alert alert-success">{{ session('success') }}</div>
                    @endif

                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Designation</th>
                                    <th>Image</th>
                                    <th>Facebook</th>
                                    <th>LinkedIn</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($teams as $key => $team)
                                    <tr>
                                        <td>{{ $key + 1 }}</td>
                                        <td>{{ $team->name }}</td>
                                        <td>{{ $team->designation }}</td>
                                        <td>
                                            <img src="{{ asset($team->image) }}" alt="Team Image" width="50" height="50">
                                        </td>
                                        <td>
                                            @if ($team->facebook_link)
                                                <a href="{{ $team->facebook_link }}" target="_blank">Facebook</a>
                                            @else
                                                N/A
                                            @endif
                                        </td>
                                        <td>
                                            @if ($team->linkedin_link)
                                                <a href="{{ $team->linkedin_link }}" target="_blank">LinkedIn</a>
                                            @else
                                                N/A
                                            @endif
                                        </td>
                                        <td>
                                            <a href="{{ route('team.edit', $team->id) }}" class="btn btn-sm btn-warning">Edit</a>
                                            <form action="{{ route('team.destroy', $team->id) }}" method="POST" class="d-inline-block">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
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

@endsection
