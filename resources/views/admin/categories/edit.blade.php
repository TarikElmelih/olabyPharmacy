@extends('admin.layouts.app')
@section('title', 'Edit Category')

@section('content')
<div class="container">
    <h1>تعديل صنف</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.categories.update', $category->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="name">اسم الصنف:</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $category->name) }}" required>
        </div>

        <div class="form-group">
            <label for="code">الكود:</label>
            <input type="text" class="form-control" id="code" name="code" value="{{ old('code', $category->code) }}" required>
        </div>

        <div class="form-group">
            <label for="image">الصورة:</label>
            <input type="file" class="form-control" id="image" name="image">
            @if ($category->image)
                <img src="{{ asset('images/categories/' . $category->image) }}" alt="Category Image" width="100">
            @endif
        </div>

        <div class="form-group">
            <label for="desc">الوصف:</label>
            <textarea class="form-control" id="desc" name="desc" rows="3">{{ old('desc', $category->desc) }}</textarea>
        </div>

        <button type="submit" class="btn btn-primary">تحديث</button>
    </form>
</div>
@endsection
