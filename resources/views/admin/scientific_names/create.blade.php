<!-- resources/views/admin/scientific_names/create.blade.php -->
@extends('admin.layouts.app')
@section('title', 'Create Scientific Name')

@section('content')
<div class="main-wrapper">
    <div class="page-wrapper">
        <div class="content">
            <div class="page-header">
                <div class="page-title">
                    <h4>Create Scientific Name</h4>
                    <h6>Add a new scientific name</h6>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('admin.scientific_names.store') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" name="name" id="name" class="form-control" placeholder="Scientific Name" required>
                        </div>
                        <button type="submit" class="btn btn-primary mt-3">Create</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
