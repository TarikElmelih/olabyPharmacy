<!-- resources/views/admin/scientific_names/show.blade.php -->
@extends('admin.layouts.app')
@section('title', 'Scientific Name Details')

@section('content')
<div class="main-wrapper">
    <div class="page-wrapper">
        <div class="content">
            <div class="page-header">
                <div class="page-title">
                    <h4>Scientific Name Details</h4>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <h5>Name: {{ $scientificName->name }}</h5>
                    <a href="{{ route('admin.scientific_names.edit', $scientificName->id) }}" class="btn btn-primary mt-3">Edit</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
