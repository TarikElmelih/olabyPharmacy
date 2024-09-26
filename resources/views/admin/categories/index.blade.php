@extends('admin.layouts.app')
@section('title', 'Categories')


@section('content')

    <div class="main-wrapper">
        <div class="page-wrapper">
            <div class="content">
                <div class="page-header">
                    <div class="page-title">
                        <h4>قائمة التصنيفات</h4>
                        <h6>إدارة الأصناف الخاصة بك</h6>
                    </div>
                    <div class="page-btn">
                        <a href="{{ route('admin.categories.create') }}" class="btn btn-added">
                            <img src="/admin_assets/img/icons/plus.svg" alt="img" class="me-1" />إضاف صنف جديد
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
                    <th>صورة</th>
                    <th>اسم الصنف</th>
                    <th>كود</th>
                    <th>وصف</th>
                    <th>أنشأ بواسطة</th>
                    <th>الإجراءات</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($categories as $category)

                <tr>
                    <td><label class="checkboxs"><input type="checkbox" /><span class="checkmarks"></span></label></td>

                    <td>
                        @if ($category->image)
                            <img src="{{ asset('images/categories/' . $category->image) }}" alt="{{ $category->name }}" style="max-width: 100px; max-height: 100px;">
                        @else
                            لا يوجد صورة
                        @endif
                    </td>
                    <td>{{ $category->name }}</td>
                    <td>{{ $category->code }}</td>
                    <td>{{ $category->description }}</td>
                    <td>{{ $category->created_by }}</td>
                    <td>
                        <a class="me-3" href="{{ route('admin.categories.show', $category->id) }}" ><img src="/admin_assets/img/icons/eye.svg" alt="img" /></a>
                        <a class="me-3" href="{{ route('admin.categories.edit', $category->id) }}" > <img src="/admin_assets/img/icons/edit.svg" alt="img" /></a>

                        <form action="{{ route('admin.categories.destroy', $category->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-link confirm-text">
                                <img src="/admin_assets/img/icons/delete.svg" alt="img" />
                            </button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="6">لم يتم إيجاد صنف.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

</div>
</div>
</div>
</div>
</div>
@endsection

