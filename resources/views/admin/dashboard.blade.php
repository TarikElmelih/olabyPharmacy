@extends('admin.layouts.app')

@section('title', 'لوحة التحكم')

@section('content')
<div class="page-wrapper">
    <div class="content">
        <div class="row">
            <!-- Patient Schedules Card -->
            <div class="col-lg-3 col-sm-6 col-12 d-flex">
                <div class="dash-count das1">
                    <div class="dash-counts">
                        <h4>{{ $patientScheduleCount }}</h4>
                        <h5>المرضى</h5>
                    </div>
                    <div class="dash-imgs">
                        <i data-feather="calendar"></i>
                    </div>
                </div>
            </div>

            <!-- Subcategories Card -->
            <div class="col-lg-3 col-sm-6 col-12 d-flex">
                <div class="dash-count das2">
                    <div class="dash-counts">
                        <h4>{{ $subcategoriesCount }}</h4>
                        <h5>الفئات</h5>
                    </div>
                    <div class="dash-imgs">
                        <i data-feather="layers"></i>
                    </div>
                </div>
            </div>

            <!-- Categories Card -->
            <div class="col-lg-3 col-sm-6 col-12 d-flex">
                <div class="dash-count das3">
                    <div class="dash-counts">
                        <h4>{{ $categoriesCount }}</h4>
                        <h5>الفئات</h5>
                    </div>
                    <div class="dash-imgs">
                        <i data-feather="list"></i>
                    </div>
                </div>
            </div>

            <!-- Products Card -->
            <div class="col-lg-3 col-sm-6 col-12 d-flex">
                <div class="dash-count das4">
                    <div class="dash-counts">
                        <h4>{{ $productsCount }}</h4>
                        <h5>المنتجات</h5>
                    </div>
                    <div class="dash-imgs">
                        <i data-feather="box"></i>
                    </div>
                </div>
            </div>
        </div>
        <!-- Exchange Number Display -->
        <div class="row mt-4">
            <div class="col-lg-12">
                <div class="alert alert-info">
                    <strong> سعر الصرف:</strong> {{ $exchangeNumber }}
                </div>
            </div>
        </div>
        <!-- Tables Section -->
        <div class="row">
            <!-- Last 5 Users Table -->
            <div class="col-lg-6">
                <div class="table-responsive">
                    <h5>آخر 5 مستخدمين</h5>
                    <table class="table table-hover table-bordered">
                        <thead class="thead-dark">
                            <tr>
                                <th>الرقم</th>
                                <th>الاسم</th>
                                <th>البريد الإلكتروني</th>
                                <th>تاريخ الإنشاء</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($lastUsers as $user)
                                <tr>
                                    <td>{{ $user->id }}</td>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>{{ $user->created_at->format('d M Y') }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- Last 5 Products Table -->
            <div class="col-lg-6">
                <div class="table-responsive">
                    <h5>آخر 5 منتجات</h5>
                    <table class="table table-hover table-bordered">
                        <thead class="thead-dark">
                            <tr>
                                <th>الرقم</th>
                                <th>الاسم</th>
                                <th>السعر</th>
                                <th>تاريخ الإنشاء</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($lastProducts as $product)
                                <tr>
                                    <td>{{ $product->id }}</td>
                                    <td>{{ $product->name }}</td>
                                    <td>{{ $product->price }}</td>
                                    <td>{{ $product->created_at->format('d M Y') }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        
    </div>
</div>
@endsection
