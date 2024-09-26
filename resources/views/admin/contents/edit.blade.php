@extends('admin.layouts.app')
@section('title', 'Edit Content')

@section('content')
<div class="main-wrapper">
    <div class="page-wrapper">
        <div class="content">
            <div class="page-header">
                <div class="page-title">
                    <h4>إدارة المحتوى</h4>
                    <h6>تعديل المحتوى</h6>
                </div>
            </div>

            <div class="card">
                <div class="card-body">
                    <form action="{{ route('contents.update', $content->id) }}" method="POST" enctype="multipart/form-data">

                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label>حول المتجر</label>
                            <input type="text" class="form-control" name="about_store" value="{{ $content->about_store }}" required>
                        </div>
                        <div class="form-group">
                            <label>ميزات المتجر</label>
                            <input type="text" class="form-control" name="store_features" value="{{ $content->store_features }}" required>
                        </div>
                        <div class="form-group">
                            <label>عنوان المتجر</label>
                            <input type="text" class="form-control" name="store_address" value="{{ $content->store_address }}" required>
                        </div>
                        <div class="form-group">
                            <label>رقم الهاتف</label>
                            <input type="text" class="form-control" name="phone" value="{{ $content->phone }}" required>
                        </div>
                        <div class="form-group">
                            <label>البريد الالكتروني</label>
                            <input type="email" class="form-control" name="email" value="{{ $content->email }}" required>
                        </div>
                        <div class="form-group">
                            <label>رابط صفحة الفيسبوك</label>
                            <input type="url" class="form-control" name="facebook_link" value="{{ $content->facebook_link }}">
                        </div>
                        <div class="form-group">
                            <label>رابط الواتساب</label>
                            <input type="url" class="form-control" name="whatsapp_link" value="{{ $content->whatsapp_link }}">
                        </div>
                        <div class="form-group">
                            <label>رابط حساب الانستغرام</label>
                            <input type="url" class="form-control" name="instagram_link" value="{{ $content->instagram_link }}">
                        </div>
                        <div class="form-group">
                            <label>  صورة من نحن لابتوب</label>
                            <input type="file" class="form-control" name="desktop_about_image">
                            @if($content->desktop_about_image)
                                <img src="{{ Storage::url($content->desktop_about_image) }}" alt="Desktop About Image" width="100">
                            @endif
                        </div>
                        <div class="form-group">
                            <label>صورة من نحن جوال</label>
                            <input type="file" class="form-control" name="mobile_about_image">
                            @if($content->mobile_about_image)
                                <img src="{{ Storage::url($content->mobile_about_image) }}" alt="Mobile About Image" width="100">
                            @endif
                        </div>
                        <div class="form-group">
                            <label>سعر الصرف</label>
                            <input type="number" step="0.01" class="form-control" name="exchange_number" value="{{ $content->exchange_number }}" required>
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
