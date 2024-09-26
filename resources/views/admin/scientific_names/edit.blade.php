<!-- resources/views/admin/scientific_names/edit.blade.php -->
@extends('admin.layouts.app')
@section('title', 'Edit Scientific Name')

@section('content')
<div class="main-wrapper">
    <div class="page-wrapper">
        <div class="content">
            <div class="page-header">
                <div class="page-title">
                    <h4>Edit Scientific Name</h4>
                    <h6>Edit the selected scientific name</h6>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('admin.scientific_names.update', $scientificName->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" name="name" id="name" class="form-control" value="{{ $scientificName->name }}" required>
                        </div>
                        <button type="submit" class="btn btn-primary mt-3">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
