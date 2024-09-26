<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>صيدلية العلبي</title>
    <link rel="icon" href="{{ asset('assets/img/favicon.png') }}">
    <!-- CSS only -->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/owl.theme.default.min.css') }}">
    <link rel="stylesheet" href="public/assets/css/font.css">

    <!-- fancybox -->
    <link rel="stylesheet" href="{{ asset('assets/css/jquery.fancybox.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/nice-select.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/splitting.css') }}">
    <!-- Font Awesome 6 -->
    <link rel="stylesheet" href="{{ asset('assets/css/fontawesome.min.css') }}">
    <!-- style -->
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <!-- responsive -->
    <link rel="stylesheet" href="{{ asset('assets/css/responsive.css') }}">
    <script src="{{ asset('assets/js/jquery-3.6.0.min.js') }}"></script>
    <script src="{{ asset('assets/js/preloader.js') }}"></script>
</head>
<style>
    /*cart*/

 .donation {
            position: fixed;
            bottom: 20px;
            left: 20px;
            z-index: 10000;
            background-color: rgba(0, 0, 0, 0.7);
            padding: 10px;
            border-radius: 50px;
        }

        .donation .pr-cart {
            display: flex;
            align-items: center;
            text-decoration: none;
        }

        .donation .badge {
            margin-right: 10px;
        }

        .donation .fas {
            color: white !important;
        }
</style>
<body>
      
    <!-- preloader -->
    <div class="preloader">
        <div class="loader">
            <div class="dot"></div>
            <div class="dot"></div>
            <div class="dot"></div>
            <div class="dot"></div>
        </div>
    </div>
    <!-- preloader end -->

    @include('front.layout.header')
     <div class="donation">
        <a href="/cart" class="pr-cart">
            <span id="cart-item-count" class="badge badge-pill badge-danger" style=" color:#f5436e !important; font-size: 20px;">0</span>
            <i class="fas fa-shopping-cart fa-2x" style="color: white !important;"></i>
        </a>
    </div>
    
        @yield('content')
   
    
    @include('front.layout.footer')



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
    
        document.querySelectorAll('.add-to-cart').forEach(function (button) {
            button.addEventListener('click', function (event) {
                event.preventDefault();
                const form = this.closest('form');
                const formData = new FormData(form);
    
                fetch('/cart', {
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

<!-- Bootstrap core JS-->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>

<!-- Core theme JS-->
<!-- Scripts -->
<script src="{{ asset('assets/js/scripts.js') }}"></script>
<!-- Bootstrap Js -->
<script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('assets/js/jquery.nice-select.min.js') }}"></script>
<script src="{{ asset('assets/js/owl.carousel.min.js') }}"></script>
<script src="{{ asset('assets/js/splitting.js') }}"></script>
<!-- fancybox -->
<script src="{{ asset('assets/js/jquery.fancybox.min.js') }}"></script>
<script src="{{ asset('assets/js/custom.js') }}"></script>
</body>
