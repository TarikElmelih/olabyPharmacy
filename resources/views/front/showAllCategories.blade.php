<!-- categories/index.blade.php -->

@extends('front.layout.app')

@section('title', 'جميع التصنيفات')

@section('content')
<style>
    body {
        direction: rtl;
        text-align: right;
    }
    .category-container {
        display: flex;
        flex-wrap: wrap;
        justify-content: space-around;
        gap: 20px;
    }
    .category-card {
        background: #fff;
        border-radius: 10px;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        text-align: center;
        padding: 20px;
        width: 200px;
        transition: transform 0.3s;
    }
    .category-card:hover {
        transform: scale(1.05);
    }
    .category-image {
        width: 100px;
        height: 100px;
        object-fit: cover;
        border-radius: 50%;
        margin-bottom: 10px;
    }
    .category-name {
        font-size: 18px;
        font-weight: bold;
        margin-bottom: 10px;
    }
    .category-desc {
        font-size: 14px;
        color: #666;
    }
</style>

<section class="gap">
    <div class="container">
        <h2 class="text-center">جميع التصنيفات</h2>
        <div class="category-container">
            @foreach($categories as $category)
                <a href="/category/products/{{$category->id}}" class="category-card">
                    <img src="{{ asset('images/categories/' . $category->image) }}" alt="{{ $category->name }}" class="category-image">
                    <div class="category-name">{{ $category->name }}</div>
                    <div class="category-desc">{{ $category->desc }}</div>
                </a>
            @endforeach
        </div>
    </div>
</section>
@endsection
