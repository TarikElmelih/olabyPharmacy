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
    font-size: 13px;
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
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
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
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
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
    z-index: 243;
}

/* Additional styling */
.navbar-dropdown > span {
    cursor: pointer;
    color: #fff;
}

/* Mobile navigation styles */
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
    padding-right: 30px; /* Ensure enough space for the arrow icon */
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
    right: 10px;
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

.category-item.open .mobile-sub-menu {
    display: block;
}

/* Additional styling for opened submenus */
.category-item.open .toggle-submenu {
    content: '-';
    transform: rotate(45deg); /* Optional for a different visual style */
}

#res-cross {
    color: #fff;
    font-size: 24px;
    text-decoration: none;
    position: absolute;
    top: 10px;
    right: 10px;
}

/* Search Bar */
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

@media (max-width: 768px) {
    .navbar {
        display: none;
    }
}

.header-icons > a > i {
    font-size: 25px;
}

/* Mobile navigation container */
.mobile-nav {
    background: #333; /* Adjust as needed */
    color: #fff;
    padding: 10px;
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
                   @if (Route::has('login'))
                <nav class="-mx-3 flex flex-1 justify-end" style="margin-right: 20px;">
                    @auth
                        <a href="{{ url('/admin/dashboard') }}" class="flex items-center space-x-2 bg-blue-500 text-white px-4 py-2 rounded" style="text-decoration: none;">
                            <i class="fas fa-dashboard"></i>
                            <span>لوحة التحكم</span>
                        </a>
                    @else
                        <a href="{{ route('login') }}" class="flex items-center space-x-2 bg-blue-500 text-white px-4 py-2 rounded" style="text-decoration: none;">
                            <i class="fas fa-user"></i>
                            <span>تسجيل دخول</span>
                        </a>
                    @endauth
                </nav>
            @endif
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


                </div>
            </div>
        </div>
        
    </div>
  
    <div class="mobile-nav hmburger-menu" id="mobile-nav" style="display: block;">
    <div class="res-log">
        <a href="/">
            <img src="{{ asset('assets/img/logo-test1.png') }}" alt="Responsive Logo" class="white-logo">
        </a>
        <a href="javascript:void(0);" id="res-cross" onclick="closeMobileNav()"><i class="fas fa-times"></i></a>
    </div>

    <ul class="mobile-navbar-links">
        @foreach ($categories as $category)
            <li class="category-item">
                <a href="javascript:void(0);" onclick="window.location.href='/category/products/{{ $category->id }}'">{{ $category->name }}</a>
                    @if ($category->subcategories->count())
                        <span class="toggle-submenu" onclick="toggleSubmenu(this)">&#x25BC;</span> <!-- Arrow icon -->
                    @endif
                @if ($category->subcategories->count())
                    <ul class="mobile-sub-menu">
                        @foreach ($category->subcategories as $subcategory)
                            <li><a href="/subcategory/products/{{ $subcategory->id }}">{{ $subcategory->name }}</a></li>
                        @endforeach
                    </ul>
                @endif
            </li>
        @endforeach
          @if (Route::has('login'))
                <nav class="-mx-3 flex flex-1 justify-end">
                    @auth
                        <a href="{{ url('/admin/dashboard') }}" class="flex items-center space-x-2 bg-blue-500 text-white px-4 py-2 rounded" style="text-decoration: none;">
                            <i class="fas fa-tachometer-alt"></i>
                            <span>لوحة التحكم</span>
                        </a>
                    @else
                        <a href="{{ route('login') }}" class="flex items-center space-x-2 bg-blue-500 text-white px-4 py-2 rounded" style="text-decoration: none;">
                            <i class="fas fa-user"></i>
                            <span>تسجيل دخول</span>
                        </a>
                    @endauth
                </nav>
            @endif
    </ul>
    <div class="header-icons" style="margin-top: 20px;">
        <a href="{{ $contents->facebook_link }}" target="_blank"><i class="fab fa-facebook" style="color: white;"></i></a>
        <a href="{{ $contents->instagram_link }}" target="_blank"><i class="fab fa-instagram" style="color: white;"></i></a>
        <a href="{{ $contents->whatsapp_link }}" target="_blank"><i class="fab fa-whatsapp" style="color: white;"></i></a>
    </div>
</div>

<script>
function toggleSubmenu(element) {
    const categoryItem = element.closest('.category-item');
    const subMenu = categoryItem.querySelector('.mobile-sub-menu');
    const isOpen = categoryItem.classList.contains('open');

    if (isOpen) {
        subMenu.style.display = 'none';
        element.innerHTML = '&#x25BC;'; // Arrow down icon
    } else {
        subMenu.style.display = 'block';
        element.innerHTML = '&#x25B2;'; // Arrow up icon
    }

    categoryItem.classList.toggle('open');
}

function closeMobileNav() {
    document.getElementById('mobile-nav').style.display = 'none';
}
</script>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const searchInput = document.getElementById('search');
    const resultsContainer = document.getElementById('results-container');
    const resultsList = document.getElementById('results');

    searchInput.addEventListener('input', function() {
        const query = searchInput.value;

        if (query.length > 2) { // Start searching after 3 characters
            fetch(`/search-products?query=${query}`)
                .then(response => response.json())
                .then(data => {
                    resultsList.innerHTML = ''; // Clear previous results
                    data.forEach(product => {
                        const li = document.createElement('li');
                        li.textContent = product.name; // Display product name
                        resultsList.appendChild(li);
                    });
                    resultsContainer.classList.remove('hidden');
                })
                .catch(error => console.error('Error fetching search results:', error));
        } else {
            resultsContainer.classList.add('hidden');
        }
    });
});
</script>


</header>