@extends('admin.layouts.app')
@section('title', 'Add Product')

@section('content')
<div class="container mt-5">
    <h2>إنشاء منتج</h2>

    <form action="{{ route('admin.products.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="name">اسم المنتج</label>
            <input type="text" class="form-control" id="name" name="name" required>
        </div>

        <div class="form-group">
            <label for="category_id">الصنف</label>
            <select class="form-control" id="category_id" name="category_id" required>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="subcategory_id">التصنيف الفرعي</label>
            <select class="form-control" id="subcategory_id" name="subcategory_id" required>
                @foreach ($sub_categories as $sub_category)
                    <option value="{{ $sub_category->id }}">{{ $sub_category->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="brand_id">براند</label>
            <select class="form-control" id="brand_id" name="brand_id" required>
                @foreach ($brands as $brand)
                    <option value="{{ $brand->id }}">{{ $brand->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="scientific_name_id">الاسم العلمي</label>
            <select class="form-control" id="scientific_name_id" name="scientific_name_id">
                @foreach ($scientific_names as $scientific_name)
                    <option value="{{ $scientific_name->id }}">{{ $scientific_name->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="price">السعر</label>
            <input type="number" step="0.01" class="form-control" id="price" name="price" required>
        </div>

        <div class="form-group">
            <label for="discount_price">سعر الخصم</label>
            <input type="number" step="0.01" class="form-control" id="discount_price" name="discount_price">
        </div>

        <div class="form-group">
            <label for="image">الصورة</label>
            <input type="file" class="form-control-file" id="image" name="image">
        </div>

        <div class="form-group">
            <label for="short_description">وصف قصير</label>
            <textarea class="form-control" id="short_description" name="short_description" rows="2"></textarea>
        </div>

        <div class="form-group">
            <label for="long_description">وصف طويل</label>
            <textarea class="form-control" id="long_description" name="long_description" rows="4"></textarea>
        </div>

        <div class="form-group">
            <label for="in_stock">متوفر</label>
            <input type="number" class="form-control" id="in_stock" name="in_stock" required>
        </div>

        <div class="form-group">
            <label for="offer">عرض</label>
            <input type="checkbox" class="form-check-input" id="offer" name="offer">
        </div>

        <div class="form-group">
            <label for="featured">متميز</label>
            <input type="checkbox" class="form-check-input" id="featured" name="featured">
        </div>

        <div class="form-group">
            <label for="manufacturer">الشركة المصنعة</label>
            <input type="text" class="form-control" id="manufacturer" name="manufacturer">
        </div>

        <button type="submit" class="btn btn-primary">حفظ</button>
    </form>
</div>
@endsection
