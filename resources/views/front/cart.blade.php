@extends('front.layout.app')

@section('title', 'Cart')

@section('content')
<style>
    body {
        direction: rtl;
        text-align: right;
    }
    .remove-from-cart {
    border: none;
    background: transparent;
    color: #f5436e; /* Icon color */
    font-size: 20px; /* Adjust icon size */
    padding: 0; /* Remove padding */
    cursor: pointer;
}

.remove-from-cart:hover {
    color: #d43f5e; /* Color on hover */
}

</style>

<section class="gap">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <div class="container">
        <form class="woocommerce-cart-form">
            <div class="row">
                <div class="col-lg-12">
                    <div style="overflow-x:auto;overflow-y: hidden;">
                        <table class="shop_table table-responsive">
                            <thead>
                                <tr>
                                    <th class="product-name">تفاصيل المنتج</th>
                                    <th class="product-price">السعر</th>
                                    <th class="product-quantity">الكمية</th>
                                    <th class="product-subtotal">الاجمالي</th>
                                    <th class="product-remove">حذف</th> <!-- Add this column for the delete button -->
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($cart as $id => $details)
                                <tr class="product" data-id="{{ $id }}">
                                    <td class="product-name">
                                        <img alt="img" src="{{ asset('images/products/' . $details['image']) }}" style="width: 77px;">
                                        <div>
                                            <span>{{ $details['name'] }}</span>
                                        </div>
                                    </td>
                                    <td class="product-price">
                                        <span class="woocommerce-Price-amount">{{ $details['discount_price'] ?? $details['price'] }}₺</span>
                                    </td>
                                    <td class="product-quantity">
                                        <input type="number" class="input-text quantity" value="{{ $details['quantity'] }}" min="1">
                                    </td>
                                    <td class="product-subtotal">
                                        <span class="woocommerce-Price-amount">{{ ($details['discount_price'] ?? $details['price']) * $details['quantity'] }}₺</span>
                                    </td>
                                    <td class="product-remove">
                                        <button class="remove-from-cart btn btn-danger" data-id="{{ $id }}">
    <i class="fas fa-trash-alt"></i>
</button>

                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="5" class="text-center">لا يوجد منتجات في السلة.</td>
                                </tr>
                                @endforelse
                            </tbody>
                            <tfoot>
                              
                            </tfoot>
                        </table>
                    </div>
                </div>
                
                <div class="col-lg-7">
                    <div class="cart_totals">
                        <h4>اجمالي المشتريات</h4>
                        <table class="shop_table_responsive">
                            <tbody>
                                <tr class="cart-subtotal">
                                    <th>سعر المنتجات</th>
                                    <td>
                                        <span class="woocommerce-Price-amount">
                                            <bdi>
                                                <span class="woocommerce-Price-currencySymbol">₺</span>{{ array_sum(array_map(fn($item) => ($item['discount_price'] ?? $item['price']) * $item['quantity'], $cart)) }}
                                            </bdi>
                                        </span>
                                    </td>
                                </tr>
                                <tr class="Shipping">
                                    <th>تكلفة التوصيل:</th>
                                    <td>
                                        <span class="woocommerce-Price-amount amount">20₺</span>
                                    </td>
                                </tr>
                                <tr class="Total">
                                    <th>الاجمالي:</th>
                                    <td>
                                        <span class="woocommerce-Price-amount">
                                            <bdi>
                                                <span>₺</span>{{ array_sum(array_map(fn($item) => ($item['discount_price'] ?? $item['price']) * $item['quantity'], $cart)) + 20 }}
                                            </bdi>
                                        </span>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="delivery-options">
                            <h4> خيارات الدفع</h4>
                           <select id="deliveryOption" class="form-control">
    <option value="غير محدد" disabled selected>اختر طريقة الدفع</option>
    <option value="شامنا">شامنا</option>
    <option value="الأمانة">الأمانة</option>
    <option value="نقدي عند التسليم">نقدي عند التسليم</option>
</select>

                        </div>
                        <div class="wc-proceed-to-checkout">
                            <a href="#" class="btn"><span>اتمام عملية الشراء</span></a>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</section>
@php
                $contents = \App\Models\Content::first();
            @endphp
<script>
document.addEventListener('DOMContentLoaded', function () {
    const fixedDeliveryCost = 20; // Fixed delivery cost
    const checkoutButton = document.querySelector('.wc-proceed-to-checkout .btn');
    const deliveryOptionSelect = document.getElementById('deliveryOption');

    // Disable the checkout button by default
    checkoutButton.disabled = true;

    function updateCartItemCount() {
        fetch('/cart/item-count')
            .then(response => response.json())
            .then(data => {
                document.getElementById('cart-item-count').textContent = data.itemCount;
            })
            .catch(error => console.error('Error:', error));
    }

    function calculateTotal() {
    let total = 0;
    document.querySelectorAll('.product-subtotal .woocommerce-Price-amount').forEach(function (element) {
        total += parseFloat(element.textContent.replace('₺', ''));
    });
    document.querySelector('.cart-subtotal .woocommerce-Price-amount').innerHTML = `<bdi><span class="woocommerce-Price-currencySymbol">₺</span>${total.toFixed(2)}</bdi>`;
    document.querySelector('.Total .woocommerce-Price-amount').innerHTML = `<bdi><span>₺</span>${(total + fixedDeliveryCost).toFixed(2)}</bdi>`;
}

    function updateCart(id, quantity) {
        fetch('/cart/update', {
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                'Content-Type': 'application/json'
            },
            body: JSON.stringify({ items: { [id]: quantity } })
        })
        .then(response => response.json())
        .then(data => {
            if (!data.success) {
                alert('Error updating cart');
            }
        })
        .catch(error => console.error('Error:', error));
    }

    // Enable checkout button only when an option is selected
    deliveryOptionSelect.addEventListener('change', function () {
        if (deliveryOptionSelect.value !== 'غير محدد') {
            checkoutButton.disabled = false;
        } else {
            checkoutButton.disabled = true;
        }
    });

    checkoutButton.addEventListener('click', function(e) {
        e.preventDefault();
        if (deliveryOptionSelect.value === 'غير محدد') {
            alert('يرجى اختيار طريقة الدفع قبل اتمام عملية الشراء.');
            return;
        }

        const cartItems = [];
        document.querySelectorAll('.product').forEach(function (row) {
            const name = row.querySelector('.product-name span').textContent;
            const price = row.querySelector('.product-price .woocommerce-Price-amount').textContent;
            const quantity = row.querySelector('.quantity').value;
            cartItems.push(`${name} (x${quantity}) - ${price}`);
        });

        const total = document.querySelector('.Total .woocommerce-Price-amount').textContent;
        const selectedOption = deliveryOptionSelect.selectedOptions[0].text;
        const message = `السلام عليكم ورحمة الله وبركاته \n أريد هذا الطلب:\n\n${cartItems.join('\n')}\n\nالدفع عن طريق : ${selectedOption}\n\nTotal: ${total}`;
        const phoneNumber = '{{ $contents->phone }}'; // Replace with your WhatsApp number
        const whatsappURL = `https://wa.me/${phoneNumber}?text=${encodeURIComponent(message)}`;

        window.open(whatsappURL, '_blank');
    });

    document.querySelectorAll('.quantity').forEach(function (input) {
        input.addEventListener('input', function () {
            const row = this.closest('tr');
            const price = parseFloat(row.querySelector('.product-price .woocommerce-Price-amount').textContent.replace('₺', ''));
            const quantity = this.value;
            const subtotal = price * quantity;
            row.querySelector('.product-subtotal .woocommerce-Price-amount').innerHTML = `<bdi><span class="woocommerce-Price-currencySymbol">₺</span>${subtotal}</bdi>`;
            calculateTotal();
            updateCartItemCount();
        });

        input.addEventListener('change', function () {
            const row = this.closest('tr');
            const id = row.getAttribute('data-id');
            const quantity = this.value;

            updateCart(id, quantity);
        });

        input.addEventListener('keypress', function (e) {
            if (e.key === 'Enter') {
                e.preventDefault();
                this.blur(); 
            }
        });
    });

    document.querySelectorAll('.remove-from-cart').forEach(function (button) {
        button.addEventListener('click', function (e) {
            e.preventDefault();
            const row = this.closest('tr');
            const id = row.getAttribute('data-id');

            fetch(`/cart/${id}`, {
                method: 'DELETE',
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                    'Content-Type': 'application/json'
                }
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    row.remove();
                    calculateTotal();
                    updateCartItemCount();
                } else {
                    alert('Error removing item from cart');
                }
            })
            .catch(error => console.error('Error:', error));
        });
    });

    updateCartItemCount();
    calculateTotal();
});

</script>
@endsection
