@extends('front.layout.app')

@section('title', 'Home Page')

@section('content')

<style>

/* Product grid styling */
.product-grid {
    direction:rtl;
    display: grid;
    gap: 1rem;
    padding: 1rem;
    grid-template-columns: repeat(auto-fill, minmax(150px, 1fr));
}

@media (min-width: 640px) {
    .product-grid {
        grid-template-columns: repeat(2, 1fr); /* 2 items per row on small screens */
    }
}

@media (min-width: 1024px) {
    .product-grid {
        grid-template-columns: repeat(3, 1fr); /* 3 items per row on desktop view */
    }
}

@media (min-width: 1440px) {
    .product-grid {
        grid-template-columns: repeat(4, 1fr); /* 4 items per row on larger desktop view */
    }
}

/* Custom width for product items */
.product-card {
    background: #fff;
    border: 1px solid #e0e0e0;
    border-radius: 8px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    padding: 1rem;
    display: flex;
    flex-direction: column;
    justify-content: space-between;
    height: 100%; /* Ensure the card takes full height */
}

/* Styling for the product image */
.product-image-container {
    display: flex;
    justify-content: center;
    align-items: center;
    margin-bottom: 1rem;
    position: relative;
    padding-top: 100%;
    overflow: hidden;
    border-radius: 8px;
    height: 0; /* Maintain aspect ratio */
}

.product-image {
    width: 100%;
    height: 100%;
    object-fit: cover;
    position: absolute;
    top: 0;
    left: 0;
}

/* Styling for product info */
.product-info {
    text-align: center;
}

.product-category {
    display: block;
    font-size: 0.875rem;
    color: #888;
    margin-bottom: 0.5rem;
}

.product-name {
    font-size: 1rem;
    margin-bottom: 0.5rem;
}

.product-price {
    font-size: 1rem;
    margin-bottom: 1rem;
}

.current-price {
    color: #f44336;
    font-weight: bold;
}

.original-price {
    color: #888;
}

/* Styling for the add to cart button */
.add-to-cart-form {
    text-align: center;
}

.add-to-cart-btn {
    display: inline-flex;
    align-items: center;
    padding: 0.5rem 1rem;
    background-color: #f5436e;
    color: #fff;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    transition: background-color 0.3s ease;
    
}

.add-to-cart-btn:hover {
    background-color: #39b2ab;
}

.add-to-cart-btn i {
    margin-right: 0.5rem;
}
/**/
#floating-cart {
    z-index:2143;
    position: fixed;
    bottom: 20px; /* Adjust this value to position it vertically */
    right: 20px; /* Adjust this value to position it horizontally */
    background: #333; /* Background color for the cart */
    color: white; /* Text color */
    border-radius: 10px; /* Rounded corners */
    padding: 15px; /* Padding around the content */
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2); /* Shadow effect */
    z-index: 1000; /* Ensure it appears above other elements */
    display: none; /* Initially hide the cart details */
    transition: opacity 0.3s ease-in-out; /* Smooth transition */
}

#floating-cart #cart-icon {
    cursor: pointer;
    font-size: 24px; /* Adjust size as needed */
    margin-bottom: 10px; /* Space between icon and details */
}

#floating-cart #cart-details {
    display: none; /* Hide cart details initially */
}

#floating-cart:hover #cart-details {
    display: block; /* Show details on hover */
}

#checkout-button {
    background-color: #f5436e; /* Button color */
    border: none;
    color: white;
    padding: 10px 20px;
    border-radius: 5px;
    cursor: pointer;
}

/**/
.pick-Your-Product {
    display: flex;
    flex-direction: column;
    align-items: center; /* Center content horizontally */
}

.content-wrapper {
    display: flex;
    align-items: center; /* Center items vertically */
    justify-content: space-between; /* Space between image and text */
    gap: 20px; /* Optional: space between items, adjust as needed */
    width: 100%; /* Make sure it uses the full width of its container */
}

.image-container {
    width: 50px; /* Set the diameter of the circle */
    height: 50px; /* Set the diameter of the circle */
    border-radius: 50%; /* Make the container circular */
    overflow: hidden; /* Hide any overflow to maintain the circle shape */
    display: flex;
    align-items: center;
    justify-content: center;
    border: 2px solid #ddd; /* Optional: border around the image */
    background-color: #f8f8f8; /* Optional: background color */
}

.category-image {
    width: 100%; /* Make the image fit the container */
    height: 100%; /* Make the image fit the container */
    object-fit: cover; /* Ensure the image covers the container */
}

.category-name {
    font-size: 16px; /* Adjust text size as needed */
    flex-grow: 1; /* Allow text to take up remaining space */
}


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
        

.hero-section-three .item {
    background-size: cover;
    background-repeat: no-repeat;
    background-position: center center;
}


@media (min-width: 768px) {
    .hero-section-three .item {
        background-image: url('');
    }
}

@media (max-width: 767px) {
    .hero-section-three .item {
        background-image: url('');
    }
}




        #search-container {
            position: relative;
            margin: 20px;
        }

        #search {
            width: 100%;
            padding: 10px;
            font-size: 16px;
            border: 1px solid #ddd;
            border-radius: 4px;
        }

        #results-container {
            position: absolute;
            top: 45px; /* Adjust based on your search input height */
            width: 100%;
            border: 1px solid #ddd;
            border-top: none; /* To blend with the search input */
            background-color: #fff;
            z-index: 1000;
            border-radius: 0 0 4px 4px;
            max-height: 200px;
            overflow-y: auto;
            box-shadow: 0 2px 4px rgba(0,0,0,0.2);
        }

        #results {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        #results li {
            margin: 0;
            padding: 10px;
            border-bottom: 1px solid #ddd;
            transition: background-color 0.3s;
        }

        #results li:hover {
            background-color: #f1f1f1;
        }

        #results a {
            text-decoration: none;
            color: #007bff;
            font-size: 16px;
            display: block;
        }

        #results a:hover {
            text-decoration: underline;
        }

        /* Optional: Hide the dropdown when no results */
        .hidden {
            display: none;
        }
         #search-header {
            font-size: 24px;
            font-weight: bold;
            margin-bottom: 10px;
        }

</style>
  <!-- Floating cart container -->
  
       <!-- Toast Notification for Success -->
        @if (session('success'))
        <div class="toast-container position-fixed top-0 end-0 p-3" style="z-index: 1111111111">
            <div id="liveToast" class="toast" role="alert" aria-live="assertive" aria-atomic="true" data-bs-delay="5000">
                <div class="toast-header">
                    <strong class="me-auto">نجاح</strong>
                    <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
                </div>
                <div class="toast-body">
                    {{ session('success') }}
                </div>
            </div>
        </div>
        @endif
        @php
        $contents = \App\Models\Content::first();
        @endphp

<section class="hero-section-three">
    <div class="slider-hero owl-carousel">
        @foreach($slides as $slide)
        <div class="item hero-section three" 
             data-desktop-image="{{ asset('images/slides/' . $slide->desktop_image) }}" 
             data-mobile-image="{{ asset('images/slides/' . $slide->mobile_image) }}">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-6">
                        <div class="hero-text">
                            <h1>{{ $slide->title }}</h1>
                            <p>{{ $slide->description }}</p>
                            @if($slide->button_link && $slide->button_text)
                                <a href="{{ $slide->button_link }}" class="btn">{{ $slide->button_text }}</a>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</section>


<section class="gap">
    <div class="container">
        <div class="all-categories">
            <div class="heading two ">
                <h6 >تصفح العديد من التصنيفات </h6>
                <h2 >اختر المنتجات حسب التصنيف</h2>
            </div>
            <a href="{{ route('categories.index') }}">جميع التصنيفات <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" width="256" height="256" viewBox="0 0 256 256" xml:space="preserve">
                            <g style="stroke: none; stroke-width: 0; stroke-dasharray: none; stroke-linecap: butt; stroke-linejoin: miter; stroke-miterlimit: 10; fill: none; fill-rule: nonzero; opacity: 1;" transform="translate(1.4065934065934016 1.4065934065934016) scale(2.81 2.81)">
                                <path d="M 88 47 H 2 c -1.104 0 -2 -0.896 -2 -2 s 0.896 -2 2 -2 h 86 c 1.104 0 2 0.896 2 2 S 89.104 47 88 47 z" style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-linejoin: miter; stroke-miterlimit: 10; fill: rgb(0,0,0); fill-rule: nonzero; opacity: 1;" transform=" matrix(1 0 0 1 0 0) " stroke-linecap="round"></path>
                                <path d="M 74.373 60.627 c -0.512 0 -1.023 -0.195 -1.414 -0.586 c -0.781 -0.781 -0.781 -2.047 0 -2.828 L 85.172 45 L 72.959 32.788 c -0.781 -0.781 -0.781 -2.047 0 -2.828 c 0.781 -0.781 2.047 -0.781 2.828 0 l 13.627 13.626 C 89.789 43.961 90 44.47 90 45 s -0.211 1.039 -0.586 1.414 L 75.787 60.041 C 75.396 60.432 74.885 60.627 74.373 60.627 z" style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-linejoin: miter; stroke-miterlimit: 10; fill: rgb(0,0,0); fill-rule: nonzero; opacity: 1;" transform=" matrix(1 0 0 1 0 0) " stroke-linecap="round"></path>
                            </g>
                        </svg></a>
        </div>
<div class="row" style="direction: rtl;">
    @foreach ($categories as $category)
        <div class="col-lg-3 col-md-4 col-sm-6">
            <a href="/category/products/{{$category->id}}" class="category-link">
                <div class="pick-Your-Product">
                    <div class="content-wrapper">
                        <div class="image-container">
                            <img src="{{ asset('images/categories/' . $category->image) }}" alt="{{ $category->name }}" class="category-image">
                        </div>
                        <span class="category-name">{{ $category->name }}</span>
                    </div>
                </div>
            </a>
        </div>
    @endforeach
</div>

    </div>
</section>
<section>
    
  
           
                  
    <div class="container" style="direction: rtl; height: 400px;" >
        <div class="heading two ">
                <h6 >    </h6>
                <h2 align="center" >طلب وصفة غير موجودة </h2>
            </div>
        <div class="gummies two" style=" background-image: url({{asset('images/Contents/a33.png')}}); background-size:contain; background-repeat: no-repeat; background-position: center; ">
            
            <div class="gummies-text">
                <div class="heading two ">
                    <p></p>
                    <p></p>
                    <p></p>
                    <p></p>
                    <p></p>
                    <p></p>
                    
                </div>

<div style="display: flex; justify-content: center;">
  <a class="btn" style="margin-bottom: 20px;" href="/prescription">طلب راشيتة</a>
</div>
     
            </div>
         
        </div>
    </div>
</section>
<section class="gap">
    <div class="container">
          <div class="all-categories">
            <div class="heading two ">
                <h6 >تصفح العديد من المنتجات </h6>
            </div>
            <a href="{{ route('product') }}">جميع المنتجات <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" width="256" height="256" viewBox="0 0 256 256" xml:space="preserve">
                            <g style="stroke: none; stroke-width: 0; stroke-dasharray: none; stroke-linecap: butt; stroke-linejoin: miter; stroke-miterlimit: 10; fill: none; fill-rule: nonzero; opacity: 1;" transform="translate(1.4065934065934016 1.4065934065934016) scale(2.81 2.81)">
                                <path d="M 88 47 H 2 c -1.104 0 -2 -0.896 -2 -2 s 0.896 -2 2 -2 h 86 c 1.104 0 2 0.896 2 2 S 89.104 47 88 47 z" style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-linejoin: miter; stroke-miterlimit: 10; fill: rgb(0,0,0); fill-rule: nonzero; opacity: 1;" transform=" matrix(1 0 0 1 0 0) " stroke-linecap="round"></path>
                                <path d="M 74.373 60.627 c -0.512 0 -1.023 -0.195 -1.414 -0.586 c -0.781 -0.781 -0.781 -2.047 0 -2.828 L 85.172 45 L 72.959 32.788 c -0.781 -0.781 -0.781 -2.047 0 -2.828 c 0.781 -0.781 2.047 -0.781 2.828 0 l 13.627 13.626 C 89.789 43.961 90 44.47 90 45 s -0.211 1.039 -0.586 1.414 L 75.787 60.041 C 75.396 60.432 74.885 60.627 74.373 60.627 z" style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-linejoin: miter; stroke-miterlimit: 10; fill: rgb(0,0,0); fill-rule: nonzero; opacity: 1;" transform=" matrix(1 0 0 1 0 0) " stroke-linecap="round"></path>
                            </g>
                        </svg></a>
        </div>
        <div class="heading ">
            <img src="assets/img/heading-img.png" alt="icon">
            <h6 ></h6>
            <h2 >المنتجات الرائجة</h2>

        </div>
<div class="product-grid">
    @foreach ($products as $product)
        <div class="product-card transition-all duration-500 transform hover:scale-105">
            <div class="product-image-container">
                <a href="{{ route('product.show', $product->id) }}">
                    <img onerror="this.setAttribute('data-error', 1)" alt="{{$product->name}}"
                         src="{{ asset('images/products/' . $product->image) }}" class="product-image">
                </a>
            </div>
            <div class="product-info">
                <a href="/category/products/{{$product->category->id}}" class="product-category">{{$product->category->name}}</a>
                <div class="product-name font-bold">{{$product->name}}</div>
                <div class="product-price flex items-center">
                    <span class="current-price">{{$product->adjusted_discount_price}} ₺</span>
                    <del class="original-price ml-2">{{$product->adjusted_price}} ₺</del>
                </div>
                <form action="{{ route('cart.store') }}" method="POST" class="add-to-cart-form">
                    @csrf
                    <input type="hidden" name="product_id" value="{{ $product->id }}">
                    <button type="submit" class="add-to-cart-btn">
                        <i class="mdi mdi-cart-plus"></i> إضاقة للسلة
                    </button>
                </form>
            </div>
        </div>
    @endforeach
</div>


        </div>
    </div>
</section>



<div class="container gap ">
    <div class="clients-slider owl-carousel">
        @foreach ($brands as $brand)
        <div class="item" style="width: 100px !important">
            <a href="/brand/products/{{$brand->id}}">
            <img style="width: 100px !important" alt="{{$brand->name}}" src="images/brands/{{$brand->image}}">
            </a>
        </div> 
        
        @endforeach
        
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const items = document.querySelectorAll('.hero-section-three .item');

        function updateBackgroundImages() {
            const isMobile = window.innerWidth < 768;
            items.forEach(item => {
                const desktopImage = item.getAttribute('data-desktop-image');
                const mobileImage = item.getAttribute('data-mobile-image');
                const imageUrl = isMobile ? mobileImage : desktopImage;
                item.style.backgroundImage = `url('${imageUrl}')`;
            });
        }

        // Initial load
        updateBackgroundImages();

        // Update on window resize
        window.addEventListener('resize', updateBackgroundImages);
    });
</script>

 <script type="text/javascript">
 $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
        $(document).ready(function(){
            $('#search').on('keyup', function(){
                var query = $(this).val();
                if (query.length > 0) {
                    $.ajax({
                        url: "{{ route('search.products') }}",
                        type: "GET",
                        data: {'query': query},
                        success: function(data){
                            $('#results').html('');
                            if(data.length > 0){
                                $.each(data, function(index, product){
                                    $('#results').append('<li><a href="/product/' + product.id + '">' + product.name + '</a></li>');
                                });
                                $('#results-container').removeClass('hidden');
                            } else {
                                $('#results').append('<li>لم يتم العثور على نتائج</li>');
                                $('#results-container').removeClass('hidden');
                            }
                        }
                    });
                } else {
                    $('#results-container').addClass('hidden');
                }
            });

            // Hide the dropdown when clicking outside
            $(document).click(function(event) { 
                if(!$(event.target).closest('#search-container').length) {
                    if($('#results-container').is(":visible")) {
                        $('#results-container').addClass('hidden');
                    }
                }        
            });
        });
    </script>
@endsection
