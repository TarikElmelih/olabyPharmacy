@extends('admin.layouts.app')
@section('title', 'Dashboard')

@section('content')
<div class="main-wrapper">
    <div class="page-wrapper">
        <div class="content">
            <div class="page-header">
                <div class="page-title">
                    <h4>قائمة المنتجات</h4>
<!--                     <h6>Manage your products</h6> -->
                </div>
                <div class="page-btn">
                    <a href="{{ route('admin.products.create') }}" class="btn btn-added">
                        <img src="/admin_assets/img/icons/plus.svg" alt="img" class="me-1" />إضاف منتج جديد
                    </a>
                </div>
            </div>

            <div class="card">
                <div class="card-body">
                    <div class="table-top">
                        <div class="search-set">
                            <div class="search-path">
                                <a class="btn btn-filter" id="filter_search">
                                    <img src="/admin_assets/img/icons/filter.svg" alt="img" />
                                    <span><img src="/admin_assets/img/icons/closes.svg" alt="img" /></span>
                                </a>
                            </div>
                            <div class="search-input">
                                <a class="btn btn-searchset">
                                    <img src="/admin_assets/img/icons/search-white.svg" alt="img" />
                                </a>
                            </div>
                        </div>
                        <div class="wordset">
                            <ul>
                                <li>
                                    <a data-bs-toggle="tooltip" data-bs-placement="top" title="pdf">
                                        <img src="/admin_assets/img/icons/pdf.svg" alt="img" />
                                    </a>
                                </li>
                                <li>
                                    <a data-bs-toggle="tooltip" data-bs-placement="top" title="excel">
                                        <img src="/admin_assets/img/icons/excel.svg" alt="img" />
                                    </a>
                                </li>
                                <li>
                                    <a data-bs-toggle="tooltip" data-bs-placement="top" title="print">
                                        <img src="/admin_assets/img/icons/printer.svg" alt="img" />
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>

                    <div class="table-responsive">
                        <table class="table datanew">
                            <thead>
                                <tr>
                                    <th><label class="checkboxs"><input type="checkbox" id="select-all" /><span class="checkmarks"></span></label></th>
                                    <th>اسم المنتج</th>
                                    <th>الصنف</th>
                                    <th>البراند</th>
                                    <th>السعر</th>
                                    <th>سعر الخصم</th>
                                    <th>صورة</th>
                                    <th>وصف قصير</th>
                                    <th>وصف طويل</th>
                                    <th>متوفر</th>
                                    <th>عرض</th>
                                    <th>متميز</th>
                                    <th>الاسم العلمي</th>
                                    <th>الشركة المصنعة</th>
                                    <th>الإجراءات</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($products as $products)
                                    <tr>
                                        <td><label class="checkboxs"><input type="checkbox" /><span class="checkmarks"></span></label></td>
                                        <td>{{ $products->name }}</td>
                                        <td>{{ $products->category->name }}</td>
                                        <td>{{ $products->brand->name }}</td>
                                        <td>{{ $products->price }}</td>
                                        <td>{{ $products->discount_price }}</td>
                                        <td>
                                            @if($products->image)
                                                <img src="{{ asset('images/products/' . $products->image) }}" alt="{{ $products->name }}" width="50">
                                            @endif
                                        </td>
                                        <td>{{ $products->short_description }}</td>
                                       @php
    $words = explode(' ', $products->long_description);
    $shortDescription = implode(' ', array_slice($words, 0, 5)) . (count($words) > 5 ? '...' : '');
@endphp

<td>{{ $shortDescription }}</td>

                                        <td>{{ $products->in_stock }}</td>
                                        <td>{{ $products->offer ? 'Yes' : 'No' }}</td>
                                        <td>{{ $products->featured ? 'Yes' : 'No' }}</td>
                                        <td>{{ $products->scientificName->name }}</td>
                                        <td>{{ $products->manufacturer }}</td>
                                        <td>
                                            <a class="me-3" href="{{ route('admin.products.show', $products->id) }}">
                                                <img src="/admin_assets/img/icons/eye.svg" alt="img" />
                                            </a>
                                            <a class="me-3" href="{{ route('admin.products.edit', $products->id) }}">
                                                <img src="/admin_assets/img/icons/edit.svg" alt="img" />
                                            </a>
                                            <form action="{{ route('admin.products.destroy', $products->id) }}" method="POST" style="display:inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-link confirm-text">
                                                    <img src="/admin_assets/img/icons/delete.svg" alt="img" />
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
