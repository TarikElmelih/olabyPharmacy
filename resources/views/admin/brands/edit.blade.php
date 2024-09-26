@extends('admin.layouts.app')
@section('title', 'Edit Brand')

@section('content')
<div class="container">
    <h1>تعديل براند</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.brands.update', $brand->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="name">الاسم:</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $brand->name) }}" required>
        </div>

        <div class="form-group">
            <label for="code">الكود:</label>
            <input type="text" class="form-control" id="code" name="code" value="{{ old('code', $brand->code) }}" required>
        </div>

        <div class="form-group">
            <label for="image">صورة:</label>
            <input type="file" class="form-control" id="image" name="image">
            @if ($brand->image)
                <img src="{{ asset('images/brands/' . $brand->image) }}" alt="Brand Image" width="100">
            @endif
        </div>

        <div class="form-group">
            <label for="desc">الوصف:</label>
            <textarea class="form-control" id="desc" name="desc" rows="3">{{ old('desc', $brand->desc) }}</textarea>
        </div>

        <button type="submit" class="btn btn-primary">تحديث</button>
    </form>
</div>
@endsection
