@extends('admin.layouts.app')
@section('title', 'View Brand')

@section('content')
<div class="container">
    <h1>عرض براند</h1>

    <div class="form-group">
        <label for="name">الاسم:</label>
        <p id="name">{{ $brand->name }}</p>
    </div>

    <div class="form-group">
        <label for="code">الكود:</label>
        <p id="code">{{ $brand->code }}</p>
    </div>

    <div class="form-group">
        <label for="image">صورة:</label>
        @if ($brand->image)
            <img src="{{ asset('images/brands/' . $brand->image) }}" alt="Brand Image" width="200">
        @else
            <p>لا توجد صورة</p>
        @endif
    </div>

    <div class="form-group">
        <label for="desc">الوصف:</label>
        <p id="desc">{{ $brand->desc }}</p>
    </div>

    <a href="{{ route('admin.brands.index') }}" class="btn btn-secondary">رجوع</a>
    <a href="{{ route('admin.brands.edit', $brand->id) }}" class="btn btn-primary">تعديل</a>
</div>
@endsection
