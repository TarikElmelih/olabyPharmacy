@extends('admin.layouts.app')
@section('title', 'create brands')

@section('content')
<div class="container">
    <h1>إنشاء براند جديد</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.brands.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="name">الاسم:</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}" required>
        </div>

        <div class="form-group">
            <label for="code">الكود:</label>
            <input type="text" class="form-control" id="code" name="code" value="{{ old('code') }}" required>
        </div>

        <div class="form-group">
            <label for="image">صورة</label>
            <input type="file" class="form-control" id="image" name="image" required>
        </div>

        <div class="form-group">
            <label for="desc">الوصف:</label>
            <textarea class="form-control" id="desc" name="desc" rows="3">{{ old('desc') }}</textarea>
        </div>



        <button type="submit" class="btn btn-primary">حفظ</button>
    </form>
</div>
@endsection
