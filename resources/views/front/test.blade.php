@extends('front.layout.app')

@section('content')

<!-- Section-->
<section class="py-5">
    <div class="container px-4 px-lg-5 mt-5">
        <!-- Products -->
        <div class="col-lg-9 mx-auto">
            <div class="row gx-3 gx-lg-5 row-cols-1 row-cols-sm-2 row-cols-md-3 justify-content-center">
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
                                    <!-- Product desc-->
                                    <p class="product-brand"><a href="/category/products/{{$product->category->id}}">{{ $product->category->name }}</a></p>
                                    <p class="">{{ $product->short_description }}</p>
                                    <!-- Product price-->
                                    <div class="product-price flex items-center">
                                        <span class="current-price">{{number_format($product->adjusted_discount_price, 1)}} ₺</span>
                                        <del class="original-price ml-2">{{number_format($product->adjusted_price, 1)}} ₺</del>
                                    </div> 
                                </div>
                            </div>
                        </a>
                        <!-- Product actions-->
                        <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                            <div class="text-center">
                                <form action="{{ route('cart.store') }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="product_id" value="{{ $product->id }}">
                                    <button type="submit" class="btn btn-outline-dark mt-auto">اضافة للسلة </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            
            <!-- Add this pagination links section -->
            <nav aria-label="Page navigation" class="mt-4">
                <ul class="pagination justify-content-center flex-wrap">
                    @if ($products->onFirstPage())
                        <li class="page-item disabled">
                            <span class="page-link" aria-label="Previous">
                                <span aria-hidden="true">&laquo;</span>
                            </span>
                        </li>
                    @else
                        <li class="page-item">
                            <a class="page-link" href="{{ $products->previousPageUrl() }}" aria-label="Previous">
                                <span aria-hidden="true">&laquo;</span>
                            </a>
                        </li>
                    @endif

                    @foreach ($products->getUrlRange(1, $products->lastPage()) as $page => $url)
                        <li class="page-item {{ $page == $products->currentPage() ? 'active' : '' }}">
                            <a class="page-link" href="{{ $url }}">{{ $page }}</a>
                        </li>
                    @endforeach

                    @if ($products->hasMorePages())
                        <li class="page-item">
                            <a class="page-link" href="{{ $products->nextPageUrl() }}" aria-label="Next">
                                <span aria-hidden="true">&raquo;</span>
                            </a>
                        </li>
                    @else
                        <li class="page-item disabled">
                            <span class="page-link" aria-label="Next">
                                <span aria-hidden="true">&raquo;</span>
                            </span>
                        </li>
                    @endif
                </ul>
            </nav>
        </div>
    </div>
</section>
@endsection
