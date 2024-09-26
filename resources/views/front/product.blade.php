@extends('front.layout.app')

@section('title', 'المنتجات')

@section('content')
<style>
    body {
        direction: rtl;
        text-align: right;
    }
</style>
<section class="gap">
    <div class="container">
        <div class="products-list">
            <div class="sort-by d-flex align-items-center">
                <span>ترتيب حسب</span>
                <select class="nice-select Advice">
                    <option>التصنيفات</option>
                    @foreach ($categories as $category)
                    <option>{{$category->name}}</option>
                    
                    @endforeach
                </select>
                <div class="nav nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                    <button class="nav-link active" id="v-pills-home-tab" data-bs-toggle="pill" data-bs-target="#v-pills-home" type="button" role="tab" aria-controls="v-pills-home" aria-selected="true">
                        <i>
                            <svg height="112pt" viewBox="0 -38 512 512" width="112pt" xmlns="http://www.w3.org/2000/svg">
                                <path d="m180 0h-160c-11.046875 0-20 8.953125-20 20v160c0 11.046875 8.953125 20 20 20h160c11.046875 0 20-8.953125 20-20v-160c0-11.046875-8.953125-20-20-20zm-20 160h-120v-120h120zm76-98c0-11.046875 8.953125-20 20-20h236c11.046875 0 20 8.953125 20 20s-8.953125 20-20 20h-236c-11.046875 0-20-8.953125-20-20zm276 76c0 11.046875-8.953125 20-20 20h-236c-11.046875 0-20-8.953125-20-20s8.953125-20 20-20h236c11.046875 0 20 8.953125 20 20zm-332 98h-160c-11.046875 0-20 8.953125-20 20v160c0 11.046875 8.953125 20 20 20h160c11.046875 0 20-8.953125 20-20v-160c0-11.046875-8.953125-20-20-20zm-20 160h-120v-120h120zm352-98c0 11.046875-8.953125 20-20 20h-236c-11.046875 0-20-8.953125-20-20s8.953125-20 20-20h236c11.046875 0 20 8.953125 20 20zm0 76c0 11.046875-8.953125 20-20 20h-236c-11.046875 0-20-8.953125-20-20s8.953125-20 20-20h236c11.046875 0 20 8.953125 20 20zm0 0"/>
                            </svg>
                        </i>
                    </button>
                    <button class="nav-link" id="v-pills-profile-tab" data-bs-toggle="pill" data-bs-target="#v-pills-profile" type="button" role="tab" aria-controls="v-pills-profile" aria-selected="false">
                        <i>
                            <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 512 512" style="enable-background:new 0 0 512 512;" xml:space="preserve">
                                <path d="M0,0v237.268h237.268V0H0z M199.805,199.805H37.463V37.463h162.341V199.805z"/>
                                <path d="M274.732,0v237.268H512V0H274.732z M474.537,199.805H312.195V37.463h162.341V199.805z"/>
                                <path d="M0,274.732V512h237.268V274.732H0z M199.805,474.537H37.463V312.195h162.341V474.537z"/>
                                <path d="M274.732,274.732V512H512V274.732H274.732z M474.537,474.537H312.195V312.195h162.341V474.537z"/>
                            </svg>
                        </i>
                    </button>
                </div>
            </div>
        </div>
        <div class="tab-content" id="v-pills-tabContent">
            <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">
                <div class="row">
                    @foreach ($products as $product)
                    <div class="col-lg-4 col-md-6">
                        <div class="trending-products">
                            <div class="trending-products-img">
                                <img width="200" src="{{ asset('images/products/' . $product->image) }}" alt="img">
                                @if ($product->featured)
                                <span>الأكثر مبيعًا</span>
                                @endif
                            </div>
                            <div class="trending-products-text">
                                <a href="#">{{ $product->name }}</a>
                                <ul class="star">
                                    @for ($i = 0; $i < 5; $i++)
                                    <li><i class="fa-solid fa-star"></i></li>
                                    @endfor
                                </ul>
                                <h4>
                                    @if ($product->discount_price)
                                    <del>₺{{ number_format($product->adjusted_price, 2) }}</del>₺{{ number_format($product->adjusted_discount_price, 2) }}
                                    @else
                                    ₺{{ number_format($product->adjusted_price, 2) }}
                                    @endif
                                </h4>
                            </div>
                             <!-- Product actions-->
                             <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                                <div class="text-center">
                                    <form action="{{ route('cart.store') }}" method="POST">
                                        @csrf
                                        <input type="hidden" name="product_id" value="{{ $product->id }}">
                                        <button type="submit" class="btn btn-outline-dark mt-auto">اضافة الى السلة</button>
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
