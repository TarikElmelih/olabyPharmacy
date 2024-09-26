
@extends('admin.layouts.app')
@section('title', 'Sub Category')

@section('content')
    <div class="container">
        <h1>SubCategories</h1>
        <a href="{{ route('admin.subcategories.create') }}" class="btn btn-primary">Create SubCategory</a>
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Category</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($subcategories as $subcategory)
                    <tr>
                        <td>{{ $subcategory->id }}</td>
                        <td>{{ $subcategory->name }}</td>
                        <td>{{ $subcategory->category->name }}</td>
                        <td>
                            <a href="{{ route('admin.subcategories.show', $subcategory->id) }}" class="btn btn-info">Show</a>
                            <a href="{{ route('admin.subcategories.edit', $subcategory->id) }}" class="btn btn-warning">Edit</a>
                            <form action="{{ route('admin.subcategories.destroy', $subcategory->id) }}" method="POST" style="display:inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection