
@extends('admin.layouts.app')
@section('title', 'Show Sub Category')

@section('content')
    <div class="container">
        <h1>SubCategory Details</h1>
        <div class="card">
            <div class="card-header">
                {{ $Sub_Category->name }}
            </div>
            <div class="card-body">
                <p>Category: {{ $Sub_Category->category->name }}</p>
            </div>
        </div>
        <a href="{{ route('admin.subcategories.index') }}" class="btn btn-primary">Back to List</a>
    </div>
@endsection