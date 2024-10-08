@extends('front.layout.app')


@section('content')
<style>
    .brand-container {
    display: flex;
    flex-direction: column;
    align-items: center;
    text-align: center;
    background-color: #f8f8f8; /* Light background for better contrast */
    border-radius: 10px;
    padding: 20px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    max-width: 300px; /* Limit width for better readability */
    margin: 20px auto; /* Center align and margin */
}

.brand-header h1 {
    font-size: 24px; /* Adjust size as needed */
    color: #333; /* Darker text for readability */
    margin-bottom: 10px;
    font-family: 'Arial', sans-serif; /* Clean and modern font */
}

.brand-image img {
    width: 100px;
    height: auto; /* Maintain aspect ratio */
    border: 2px solid #f5436e; /* Stylish border */
    transition: transform 0.3s ease; /* Smooth hover effect */
}

.brand-image img:hover {
    transform: scale(1.1); /* Zoom effect on hover */
}

</style>

<!-- Section-->
<section class="py-5">
    <div class="container px-4 px-lg-5 mt-5">
       <div class="brand-container">
    <div class="brand-header">
        <h1>{{ $brand->name }}</h1>
    </div>
    <div class="brand-image">
        <img src="{{ asset('images/brands/' . $brand->image) }}" alt="{{ $brand->name }}">
    </div>
</div>

            <!-- Products -->
            <div class="col-lg-9">
                <div class="row gx-3 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-3 justify-content-center">
                    @foreach ($products as $product)
                    <div class="col mb-5">
                        <div class="card h-100">
                            <!-- Product image-->
                            <a href="{{ route('product.show', $product->id) }}">
                            <img class="card-img-top" src="{{ asset('images/products/' . $product->image) }}" alt="..." />
                            </a>
                            <!-- Product details-->
                            <a href="{{ route('product.show', $product->id) }}">
                            <div class="card-body p-4">
                                <div class="text-center">
                                    <!-- Product name-->
                                    <h4 class="fw-bolder">{{ $product->name }}</h4>
                                    </a>
                                    <!-- Product desc-->
                                    <p class="product-brand"><a href="/brand/products/{{$product->brand->id}}">{{ $product->brand->name }}</a></p>
                                    <p class="">{{ $product->short_description }}</p>
                                    <!-- Product price-->
                                     <div class="product-price flex items-center">
                    <span class="current-price">{{number_format($product->adjusted_discount_price, 1)}} ₺</span>
                    <del class="original-price ml-2">{{number_format($product->adjusted_price, 1)}} ₺</del>
                </div>
                                </div>
                            </div>
                            <!-- Product actions-->
                            <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                                <div class="text-center">
                                    <form action="{{ route('cart.store') }}" method="POST">
                                        @csrf
                                        <input type="hidden" name="product_id" value="{{ $product->id }}">
                                        <button type="submit" class="btn btn-outline-dark mt-auto"> اضافة للسلة</button>
                                    </form>
                                </div>
                            </div>
                            
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>
@endsection