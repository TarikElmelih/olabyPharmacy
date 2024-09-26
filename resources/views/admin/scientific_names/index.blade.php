<!-- resources/views/admin/scientific_names/index.blade.php -->
@extends('admin.layouts.app')
@section('title', 'Scientific Names')

@section('content')
    <div class="main-wrapper">
        <div class="page-wrapper">
            <div class="content">
                <div class="page-header">
                    <div class="page-title">
                        <h4>Scientific Names</h4>
                        <h6>Manage Scientific Names</h6>
                    </div>
                    <div class="page-btn">
                        <a href="{{ route('admin.scientific_names.create') }}" class="btn btn-added">
                            Add New Scientific Name
                        </a>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Name</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($scientificNames as $scientificName)
                                        <tr>
                                            <td>{{ $scientificName->id }}</td>
                                            <td>{{ $scientificName->name }}</td>
                                            <td>
                                                <a href="{{ route('admin.scientific_names.edit', $scientificName->id) }}">Edit</a>
                                                <form action="{{ route('admin.scientific_names.destroy', $scientificName->id) }}" method="POST" style="display:inline;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit">Delete</button>
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
@endsection
