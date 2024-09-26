

<style>
/* Basic reset */
ul, li, a {
    margin: 0;
    padding: 0;
    list-style: none;
    text-decoration: none;
}

/* Main menu styles */
.navbar-dropdown {
    
    position: relative;
    display: inline-block;
}

.navbar-dropdown > span,
.navbar-dropdown > a {
    font-size:13px ;
    padding: 10px 15px;
    display: block;
    color: #fff; /* Adjust as per your theme */
}

.navbar-dropdown > .dropdown {
    position: absolute;
    top: 100%;
    left: 0;
    display: none;
    background-color: #fff; /* Adjust as per your theme */
    box-shadow: 0 4px 8px rgba(0,0,0,0.1);
}

.navbar-dropdown:hover > .dropdown {
    display: block;
}

/* Sub-menu styles */
.sub-menu {
    list-style: none;
    padding: 0;
    margin: 0;
}

.sub-menu .dropdown-item {
    position: relative;
}

.sub-menu .dropdown-item > a {
    display: block;
    padding: 10px 15px;
    color: #333; /* Adjust as per your theme */
    background-color: #fff; /* Adjust as per your theme */
}

.sub-menu .dropdown-item > a:hover {
    background-color: #f8f8f8; /* Adjust as per your theme */
}

.sub-menu .dropdown-item > .sub-sub-menu {
    position: absolute;
    top: 20px;
    right: 100%;
    display: none;
    background-color: #fff; /* Adjust as per your theme */
    box-shadow: 0 4px 8px rgba(0,0,0,0.1);
}

.sub-menu .dropdown-item:hover > .sub-sub-menu {
    display: block;
}

.sub-sub-menu {
    list-style: none;
    padding: 0;
    margin: 0;
}

.sub-sub-menu > li > a {
    display: block;
    padding: 10px 15px;
    color: #333; /* Adjust as per your theme */
    background-color: #fff; /* Adjust as per your theme */
}

.sub-sub-menu > li > a:hover {
    background-color: #f8f8f8; /* Adjust as per your theme */
    z-index:243;
}

/* Additional styling */
.navbar-dropdown > span {
    cursor: pointer;
    color: #fff;
}


/**/

/* Mobile navigation styles */
.mobile-nav {
    background: #333; /* Adjust as needed */
    color: #fff;
    padding: 10px;
}

.mobile-navbar-links {
    list-style-type: none;
    padding: 0;
    margin: 0;
}

.mobile-navbar-links li {
    padding: 10px 0;
    border-bottom: 1px solid #444; /* Adjust as needed */
    position: relative;
}

.mobile-navbar-links a {
    color: #fff;
    text-decoration: none;
    display: block;
    padding-right: 30px; /* Ensure enough space for the + sign */
}

.mobile-dropdown-content {
    display: none;
}

.mobile-dropdown:hover .mobile-dropdown-content {
    display: block;
}

.mobile-dropdown-menu {
    list-style-type: none;
    padding: 0;
    margin: 0;
}

.category-item {
    position: relative;
}

.toggle-submenu {
    position: absolute;
    left: 10px;
    top: 50%;
    transform: translateY(-50%);
    cursor: pointer;
    color: #fff; /* Adjust as needed */
    font-size: 18px; /* Adjust as needed */
}

.mobile-sub-menu {
    display: none;
    list-style-type: none;
    padding: 0;
    margin: 0;
    background: #444; /* Adjust as needed */
}

#res-cross {
    color: #fff;
    font-size: 24px;
    text-decoration: none;
    position: absolute;
    top: 10px;
    right: 10px;
}

@media (max-width: 768px) {
    .navbar {
        display: none;
    }
}

.header-icons> a > i{
     font-size: 25px;
}

/* Search */
#search-container {
    width: auto;
}

.search-wrapper {
    display: flex;
    align-items: center;
    border: 1px solid #DDD;
    border-radius: 5px;
    background-color: #FFFFFF;
    padding: 5px 10px;
}

#search {
    border: none;
    outline: none;
    width: 180px;
    font-size: 14px;
    direction: rtl;
    background-color: transparent;
}

.search-wrapper .fa-search {
    color: #AAA;
    margin-left: 10px;
}

</style>
  <!-- header -->
  <header class="three">
    <div class="container">
        <div class="top-bar">
            <div class="content-header">
                  @php
                $contents = \App\Models\Content::first();
            @endphp
            <div class="header-icons" style="margin-left: 50px;">
            <a href="{{ $contents->facebook_link }}" target="_blank"><i class="fab fa-facebook" style="color: white;"></i></a>
        <a href="{{ $contents->instagram_link }}" target="_blank"><i class="fab fa-instagram" style="color: white;"></i></a>
        <a href="{{ $contents->whatsapp_link }}" target="_blank"><i class="fab fa-whatsapp" style="color: white;"></i></a>

            </div>
                @php
            $categories = \App\Models\Category::with('subcategories')->limit(10)->get();
        @endphp
        @foreach ($categories as $category)
            <li class="navbar-dropdown">
                <a href="/category/products/{{ $category->id }}">{{ $category->name }}</a>
                @if ($category->subcategories->count())
                    <div class="dropdown">
                        <ul class="sub-menu" >
                            @foreach ($category->subcategories as $subcategory)
                                <li class="dropdown-item" style="z-index:21234;">
                                    <a href="/subcategory/products/{{ $subcategory->id }}">{{ $subcategory->name }}</a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                @endif
            </li>
        @endforeach
            </div>
          
            
        </div>
    </div>
    <div class="bottom-bar">
        <div class="container">
            <div class="two-bar">
                <div class="d-flex align-items-center justify-content-between">
                    <div class="logo">
                        <a href="/">
                            <img alt="logo" src="{{ asset('assets/img/logo-test1.png') }}">
                        </a>
                    </div>
                </div>
                <div class="bar-menu">
                    <i class="fa-solid fa-bars"></i>
                </div>
                

                <nav class="navbar">
    <ul class="navbar-links">
        <li class="navbar-dropdown">
            <a href="/">الصفحة الرئيسية</a>
        </li>
        <li class="navbar-dropdown">
            <a href="{{route('about')}}">من نحن</a>
        </li>

       
    </ul>
      <!-- Search Bar Integration -->
              <div id="search-container" style="direction: rtl; margin-top: 30px; display: inline-block;">
    <div class="search-wrapper" style="display: flex; align-items: center; border-radius: 5px; background-color: #FFFFFF; padding: 5px 10px;">
        <input type="text" id="search" placeholder="ابحث عن المنتجات..." style="border: none; outline: none; width: 180px; font-size: 14px; direction: rtl;">
        <i class="fas fa-search" style="color: #AAA; margin-left: 10px;"></i>
    </div>
    <div id="results-container" class="hidden">
        <ul id="results"></ul>
    </div>
</div>

</nav>

                <div class="header-search">
                    <div class="header-search-button search-box-outer">
                        <a href="javascript:void(0)" class="search-btn">
                            {{-- <svg height="24" viewBox="0 0 24 24" width="24" xmlns="http://www.w3.org/2000/svg">
                                <g data-name="12">
                                    <path
                                        d="m21.71 20.29-2.83-2.82a9.52 9.52 0 1 0 -1.41 1.41l2.82 2.83a1 1 0 0 0 1.42 0 1 1 0 0 0 0-1.42zm-17.71-8.79a7.5 7.5 0 1 1 7.5 7.5 7.5 7.5 0 0 1 -7.5-7.5z">
                                    </path>
                                </g>
                            </svg> --}}
                        </a>
                    </div>
                    <a href="#" class="user"><i>
                        {{-- <svg viewBox="0 0 512 512" xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="m437.019531 74.980469c-48.351562-48.351563-112.640625-74.980469-181.019531-74.980469s-132.667969 26.628906-181.019531 74.980469c-48.351563 48.351562-74.980469 112.640625-74.980469 181.019531s26.628906 132.667969 74.980469 181.019531c48.351562 48.351563 112.640625 74.980469 181.019531 74.980469s132.667969-26.628906 181.019531-74.980469c48.351563-48.351562 74.980469-112.640625 74.980469-181.019531s-26.628906-132.667969-74.980469-181.019531zm-325.914062 354.316406c8.453125-72.734375 70.988281-128.890625 144.894531-128.890625 38.960938 0 75.597656 15.179688 103.15625 42.734375 23.28125 23.285156 37.964844 53.6875 41.742188 86.152344-39.257813 32.878906-89.804688 52.707031-144.898438 52.707031s-105.636719-19.824219-144.894531-52.703125zm144.894531-159.789063c-42.871094 0-77.753906-34.882812-77.753906-77.753906 0-42.875 34.882812-77.753906 77.753906-77.753906s77.753906 34.878906 77.753906 77.753906c0 42.871094-34.882812 77.753906-77.753906 77.753906zm170.71875 134.425782c-7.644531-30.820313-23.585938-59.238282-46.351562-82.003906-18.4375-18.4375-40.25-32.269532-64.039063-40.9375 28.597656-19.394532 47.425781-52.160157 47.425781-89.238282 0-59.414062-48.339844-107.753906-107.753906-107.753906s-107.753906 48.339844-107.753906 107.753906c0 37.097656 18.84375 69.875 47.464844 89.265625-21.886719 7.976563-42.140626 20.308594-59.566407 36.542969-25.234375 23.5-42.757812 53.464844-50.882812 86.347656-34.410157-39.667968-55.261719-91.398437-55.261719-147.910156 0-124.617188 101.382812-226 226-226s226 101.382812 226 226c0 56.523438-20.859375 108.265625-55.28125 147.933594zm0 0" />
                        </svg> --}}
                        </i></a>
                   



                    </div>
  @if (Route::has('login'))
    <nav class="-mx-3 flex flex-1 justify-end">
        @auth
            <a href="{{ url('/admin/dashboard') }}" class="flex items-center space-x-2 bg-blue-500 text-white px-4 py-2 rounded" style="text-decoration: none;">
                <i class="fas fa-tachometer-alt"></i>
                <span>لوحة التحكم</span>
            </a>
        @else
            <a href="{{ route('login') }}" class="flex items-center space-x-2 bg-blue-500 text-white px-4 py-2 rounded" style="text-decoration: none;">
                <i class="fas fa-sign-in-alt"></i>
                <span>تسجيل دخول</span>
            </a>
        @endauth
    </nav>
@endif

                </div>
            </div>
        </div>
    </div>
<!-- Updated Mobile Navigation -->
<div class="mobile-nav hmburger-menu" id="mobile-nav" style="display: block;">
    <div class="res-log">
        <a href="index.html">
            <img src="{{ asset('assets/img/logo-drak.png') }}" alt="Responsive Logo" class="white-logo">
        </a>
    </div>
    
    <div class="header-icons">
        <a href="{{ $contents->facebook_link }}" target="_blank"><i class="fab fa-facebook" style="color: white;"></i></a>
        <a href="{{ $contents->instagram_link }}" target="_blank"><i class="fab fa-instagram" style="color: white;"></i></a>
        <a href="{{ $contents->whatsapp_link }}" target="_blank"><i class="fab fa-whatsapp" style="color: white;"></i></a>
    </div>

 @if (Route::has('login'))
    <nav class="-mx-3 flex flex-1 justify-end">
        @auth
            <a href="{{ url('/admin/dashboard') }}" class="flex items-center space-x-2 bg-blue-500 text-white px-4 py-2 rounded" style="text-decoration: none;">
                <i class="fas fa-tachometer-alt"></i>
                <span>لوحة التحكم</span>
            </a>
        @else
            <a href="{{ route('login') }}" class="flex items-center space-x-2 bg-blue-500 text-white px-4 py-2 rounded" style="text-decoration: none;">
                <i class="fas fa-sign-in-alt"></i>
                <span>تسجيل دخول</span>
            </a>
        @endauth
    </nav>
@endif



    <!-- Mobile Navbar Links -->
    
    <ul class="mobile-navbar-links">
        
        <li><a href="/">الصفحة الرئيسية</a></li>
        <li><a href="{{ route('about') }}">من نحن</a></li>
        <li><a href="{{ route('product') }}">المتجر</a></li>
        <li><a href="/cart">السلة</a></li>
        <li class="mobile-dropdown">
            <span>جديد</span>
            <a href="#">التصنيفات</a><span class="toggle-submenu">+</span>
            <div class="mobile-dropdown-content">
                <ul class="mobile-dropdown-menu">
                    @php
                        $categories = \App\Models\Category::with('subcategories')->limit(4)->get();
                    @endphp
                    @foreach ($categories as $category)
                        <li class="category-item">
                            <a href="/category/products/{{ $category->id }}">{{ $category->name }}</a>
                            <span class="toggle-submenu">+</span>
                            @if ($category->subcategories->count())
                                <ul class="mobile-sub-menu">
                                    @foreach ($category->subcategories as $subcategory)
                                        <li><a href="/subcategory/products/{{ $subcategory->id }}">{{ $subcategory->name }}</a></li>
                                    @endforeach
                                </ul>
                            @endif
                        </li>
                    @endforeach
                </ul>
            </div>
        </li>
    </ul>

    <a href="JavaScript:void(0)" id="res-cross"></a>
</div>



<script>
document.addEventListener('DOMContentLoaded', function () {
    const mobileNav = document.getElementById('mobile-nav');
    const resCross = document.getElementById('res-cross');
    const categoryItems = document.querySelectorAll('.category-item');

    resCross.addEventListener('click', function () {
        mobileNav.style.display = 'none';
    });

    categoryItems.forEach(item => {
        const toggleSubmenu = item.querySelector('.toggle-submenu');
        toggleSubmenu.addEventListener('click', function (e) {
            e.stopPropagation();
            const submenu = item.querySelector('.mobile-sub-menu');
            submenu.style.display = submenu.style.display === 'block' ? 'none' : 'block';
        });
    });
});
</script>


</header>

