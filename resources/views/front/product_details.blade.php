@extends('front.layout.app')

@section('title', $product->name)

@section('content')
<style>
    body {
        direction: rtl;
        text-align: right;
    }
</style>
<section class="gap">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <div class="product-info-img">
                    <img style="width: 300px" src="{{ asset('images/products/' . $product->image) }}" alt="صورة المنتج">
                </div>
            </div>
            <div class="col-lg-6">
                <div class="product-info">
                    <div class="d-flex align-items-center">
                        <h6><span>متوفر</span></h6>
                    </div>
                    <h2>{{ $product->name }}</h2>
                     <li><a href="/ScientificName/products/{{ $product->ScientificName->id }}">{{ $product->ScientificName->name }}</a></li>
                     <br>
                    <p>{{$product->short_description}}</p>
                    <form class="variations_form add-to-cart-form" action="{{ route('cart.store') }}" method="POST">
                        @csrf
                        <input type="hidden" name="product_id" value="{{ $product->id }}">
                        <div class="stock">
                            <span class="price">
                                @if($product->discount_price)
                                    <del>
                                        <span class="woocommerce-Price-amount">
                                            <bdi>
                                                <span class="woocommerce-Price-currencySymbol">₺</span>{{ number_format($product->adjusted_price, 1) }} 
                                            </bdi>
                                        </span>
                                    </del>
                                    <ins>
                                        <span class="woocommerce-Price-amount amount">
                                            <bdi>
                                                <span class="woocommerce-Price-currencySymbol">₺</span>{{ number_format($product->adjusted_discount_price, 1) }}
                                            </bdi>
                                        </span>
                                    </ins>
                                @else
                                    <span class="woocommerce-Price-amount amount">
                                        <bdi>
                                            <span class="woocommerce-Price-currencySymbol">₺</span>{{ number_format($product->price, 1) }}
                                        </bdi>
                                    </span>
                                @endif
                            </span>
                        </div>
                        <div class="wishlist">
                            <button type="submit" class="single_add_to_cart_button btn">أضف إلى السلة</button>
                        </div>
                        <ul class="product_meta">
                            <li><span class="theme-bg-clr">التصنيف:</span>
                                <ul class="pd-cat">
                                    <li><a href="/category/products/{{ $product->category->id }}">{{ $product->category->name }}</a></li>
                                </ul>
                            </li>
                        </ul>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="gap no-top">
    <div class="container">
        <div class="tab-style nav nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
            <button class="nav-link active" id="v-pills-home-tab" data-bs-toggle="pill" data-bs-target="#v-pills-home" type="button" role="tab" aria-controls="v-pills-home" aria-selected="true">الوصف</button>
        </div>
        <div class="tab-content" id="v-pills-tabContent">
            <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">
                <p>{{ $product->long_description }}</p>
            </div>
        </div>
    </div>
</section>
@endsection

@section('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function () {
        function updateCartItemCount() {
            fetch('/cart/item-count')
                .then(response => response.json())
                .then(data => {
                    document.getElementById('cart-item-count').textContent = data.itemCount;
                })
                .catch(error => console.error('Error:', error));
        }

        document.querySelectorAll('.add-to-cart-form').forEach(function (form) {
            form.addEventListener('submit', function (event) {
                event.preventDefault();
                const formData = new FormData(form);

                fetch(form.action, {
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                    },
                    body: formData
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        updateCartItemCount();
                        alert('تمت اضافة المنتج بنجاح!');
                    } else {
                        alert('Error adding item to cart');
                    }
                })
                .catch(error => console.error('Error:', error));
            });
        });

        updateCartItemCount();
    });
</script>
@endsection
