<div class="sidebar" id="sidebar">
    <div class="sidebar-inner slimscroll">
        <div id="sidebar-menu" class="sidebar-menu">
            @if (Auth::user()->usertype == 'admin')
            <ul>
                <li class="active">
                    <a href="{{ route('admin.dashboard') }}">
                        <img src="{{ asset('/admin_assets/img/icons/product.svg') }}" alt="img">
                        <span>لوحة التحكم</span>
                    </a>
                </li>
                <li class="submenu">
                    <a href="javascript:void(0);">
                        <img src="{{ asset('/admin_assets/img/icons/product.svg') }}" alt="img">
                        <span>المنتجات</span>
                        <span class="menu-arrow"></span>
                    </a>
                    <ul>
                        <li><a href="{{ route('admin.products.index') }}">قائمة المنتجات</a></li>
                        <li><a href="{{ route('admin.products.create') }}">إضافة منتج</a></li>
                        <li><a href="{{ route('admin.categories.index') }}">قائمة التصنيفات</a></li>
                        <li><a href="{{ route('admin.subcategories.index') }}">قائمة التصنيفات الفرعية</a></li>
                        <li><a href="{{ route('admin.categories.create') }}">لإضافة تصنيف</a></li>
                        <li><a href="{{ route('admin.brands.index') }}">قائمة براند</a></li>
                        <li><a href="{{ route('admin.brands.create') }}">إضافة براند</a></li>
                    </ul>
                </li>
                <li class="submenu">
    <a href="javascript:void(0);">
        <img src="{{ asset('/admin_assets/img/icons/product.svg') }}" alt="img">
        <span>السلايدات</span>
        <span class="menu-arrow"></span>
    </a>
    <ul>
        <li><a href="{{ route('admin.slides.index') }}">قائمة السلايدات</a></li>
        <li><a href="{{ route('admin.slides.create') }}">إضافة سلايد</a></li>
    </ul>
</li>

                <li class="submenu">
                    <a href="javascript:void(0);">
                        <img src="/admin_assets/img/icons/users1.svg" alt="img">
                        <span>مستخدمين</span>
                        <span class="menu-arrow"></span>
                    </a>
                    <ul>
                        <li><a href="{{ route('admin.patient_follow_up_schedules.index') }}">قائمة المرضى</a></li>
                        <li><a href="{{ route('admin.patient_follow_up_schedules.create') }}">إضافة مريض</a></li>
                        <li><a href="{{ route('register') }}">إضافة مستخدم</a></li>
                    </ul>
                </li>
                <li>
                    <a href="{{ route('contents.index') }}">
                        <img src="{{ asset('/admin_assets/img/icons/eye.svg') }}" alt="img">
                        <span>محتوى المتجر</span>
                    </a>
                </li>
            </ul>
            @else
            <ul>
                <li><a href="{{ route('admin.products.index') }}">قائمة المنتجات</a></li>
            </ul>
            @endif
        </div>
    </div>
</div>
