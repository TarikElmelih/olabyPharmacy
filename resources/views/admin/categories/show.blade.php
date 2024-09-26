@extends('admin.layouts.app')
@section('title', 'View Category')

@section('content')
<div class="container">
    <h1>عرض الصنف</h1>

    <div class="form-group">
        <label for="name">اسم الصنف:</label>
        <p id="name">{{ $category->name }}</p>
    </div>

    <div class="form-group">
        <label for="code">الكود:</label>
        <p id="code">{{ $category->code }}</p>
    </div>

    <div class="form-group">
        <label for="image">الصورة:</label>
        @if ($category->image)
            <img src="{{ asset('images/categories/' . $category->image) }}" alt="Category Image" width="200">
        @else
            <p>لا توجد صورة</p>
        @endif
    </div>

    <div class="form-group">
        <label for="desc">الوصف:</label>
        <p id="desc">{{ $category->desc }}</p>
    </div>

    <a href="{{ route('admin.categories.index') }}" class="btn btn-secondary">رجوع</a>
    <a href="{{ route('admin.categories.edit', $category->id) }}" class="btn btn-primary">تعديل</a>
</div>
@endsection
