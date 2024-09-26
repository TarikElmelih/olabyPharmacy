@extends('admin.layouts.app')
@section('title', 'Create Content')

@section('content')
<div class="main-wrapper">
    <div class="page-wrapper">
        <div class="content">
            <div class="page-header">
                <div class="page-title">
                    <h4>إدارة المحتوى</h4>
                    <h6>إنشاء محتوى جديد</h6>
                </div>
            </div>

            <div class="card">
                <div class="card-body">
                    <form action="{{ route('contents.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label>حول المتجر</label>
                            <input type="text" class="form-control" name="about_store" required>
                        </div>
                        <div class="form-group">
                            <label>ميزات المتجر</label>
                            <input type="text" class="form-control" name="store_features" required>
                        </div>
                        <div class="form-group">
                            <label>عنوان المتجر</label>
                            <input type="text" class="form-control" name="store_address" required>
                        </div>
                        <div class="form-group">
                            <label>رقم الهاتف</label>
                            <input type="text" class="form-control" name="phone" required>
                        </div>
                        <div class="form-group">
                            <label>البريد الالكتروني</label>
                            <input type="email" class="form-control" name="email" required>
                        </div>
                        <div class="form-group">
                            <label>رابط صفحة الفيسبوك</label>
                            <input type="url" class="form-control" name="facebook_link">
                        </div>
                        <div class="form-group">
                            <label>رابط الواتساب</label>
                            <input type="url" class="form-control" name="whatsapp_link">
                        </div>
                        <div class="form-group">
                            <label>رابط حساب الانستغرام</label>
                            <input type="url" class="form-control" name="instagram_link">
                        </div>
                        <div class="form-group">
                            <label>صورة الصفحة الرئيسية</label>
                            <input type="file" class="form-control" name="homePage_image">
                        </div>
                        <div class="form-group">
                            <label>صورة صفحة من نحن</label>
                            <input type="file" class="form-control" name="aboutUs_image">
                        </div>
                        <div class="form-group">
                            <label>رقم الصرف</label>
                            <input type="number" step="0.01" class="form-control" name="exchange_number" required>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">حفظ</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
