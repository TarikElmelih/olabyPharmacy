@extends('admin.layouts.app')
@section('title', 'Product Details')

<style>
    body{
        text-align:right;
        direction: rtl;
    }
</style>
@section('content')
<div class="container mt-5">
    <h2>تفاصيل المنتج</h2>

    <div class="card">
        <div class="card-header">
            {{ $product->name }}
        </div>
        <div class="card-body">
            <h5 class="card-title">اسم المنتج: {{ $product->name }}</h5>
            <p class="card-text">الصنف: {{ $product->category->name }}</p>
            <p class="card-text">التصنيف الفرعي: {{ $product->subcategory->name }}</p>
            <p class="card-text">براند: {{ $product->brand->name }}</p>
            <p class="card-text">السعر: {{ $product->price }}</p>
            @if($product->discount_price)
                <p class="card-text">سعر الخصم: {{ $product->discount_price }}</p>
            @endif
            @if($product->image)
                <p class="card-text">الصورة: <img src="{{ asset('images/products/' . $product->image) }}" alt="{{ $product->name }}" class="img-thumbnail" width="150"></p>
            @endif
            <p class="card-text">وصف قصير: {{ $product->short_description }}</p>
            
            
            <p class="card-text">وصف طويل: {{$product->long_description}}/p>
            
            
            <p class="card-text">متوفر: {{ $product->in_stock }}</p>
            <p class="card-text">عرض: {{ $product->offer ? 'نعم' : 'لا' }}</p>
            <p class="card-text">متميز: {{ $product->featured ? 'نعم' : 'لا' }}</p>
            <p class="card-text">الاسم العلمي: {{ $product->scientific_name }}</p>
            <p class="card-text">الشركة المصنعة: {{ $product->manufacturer }}</p>
        </div>
    </div>
</div>
@endsection

