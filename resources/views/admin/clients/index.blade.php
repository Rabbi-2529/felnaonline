@extends('admin.master')

@section('feature', 'Manage Clients')

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
                    <a href="#">Client Module</a>
                </li>
                <li class="separator">
                    <i class="icon-arrow-right"></i>
                </li>
                <li class="nav-item">
                    <a href="#">Manage Clients</a>
                </li>
            </ul>
        </div>
        <!-- PAGE-HEADER END -->

        <div class="container-fluid px-4 py-4">
            <div class="row g-4">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header border-bottom">
                            <h3 class="card-feature">Manage Clients</h3>
                            <a href="{{ route('clients.create') }}" class="btn btn-primary rounded float-end">Add New Client</a>
                        </div>
                        <div class="card-body">
                            <table class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th>Image</th>
                                        <th>Name</th>
                                        <th>Designation</th>
                                        <th>Description</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($clients as $client)
                                    <tr>
                                        <td><img src="{{ asset($client->image) }}" width="50" alt="{{ $client->name }}"></td>
                                        <td>{{ $client->name }}</td>
                                        <td>{{ $client->designation }}</td>
                                        <td>{{ Str::limit($client->description, 50) }}</td>
                                        <td>
                                            <a href="{{ route('clients.edit', $client->id) }}" class="btn btn-info btn-sm">Edit</a>
                                            <form action="{{ route('clients.destroy', $client->id) }}" method="POST" class="d-inline">
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
                
