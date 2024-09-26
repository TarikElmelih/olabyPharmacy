@extends('admin.layouts.app')
@section('title', 'محتوى لوحة التحكم')

@section('content')
<div class="main-wrapper">
    <div class="page-wrapper">
        <div class="content">
            <div class="page-header">
                <div class="page-title">
                    <h4>محتوى متجرك</h4>
                    <h6>إدارة محتوى متجرك</h6>
                </div>
              
            </div>

            <div class="row">
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body">
                            <p class="card-text"><strong>حول المتجر:</strong> {{ $contents->about_store }}</p>
                            <p class="card-text"><strong>ميزات المتجر:</strong> {{ $contents->store_features }}</p>
                            <p class="card-text"><strong>عنوان المتجر:</strong> {{ $contents->store_address }}</p>
                            <p class="card-text"><strong>رقم الهاتف:</strong> {{ $contents->phone }}</p>
                            <p class="card-text"><strong>البريد الالكتروني:</strong> {{ $contents->email }}</p>
                            <p class="card-text">
                                @if($contents->facebook_link)
                                    <a href="{{ $contents->facebook_link }}" target="_blank">Facebook</a>
                                @endif
                            </p>
                            <p class="card-text">
                                @if($contents->whatsapp_link)
                                    <a href="{{ $contents->whatsapp_link }}" target="_blank">WhatsApp</a>
                                @endif
                            </p>
                            <p class="card-text">
                                @if($contents->instagram_link)
                                    <a href="{{ $contents->instagram_link }}" target="_blank">Instagram</a>
                                @endif
                            </p>
                            <p class="card-text">
                                @if($contents->desktop_about_image)
                                    <strong>صورة من نحن لابتوب  :</strong>
                                    <div>
                                        <img src="{{ asset('images/Contents/' . $contents->desktop_about_image) }}" alt="Desktop About Image" width="100">
                                    </div>
                                @endif
                            </p>
                            <p class="card-text">
                                @if($contents->mobile_about_image)
                                    <strong>صورة من نحن جوال:</strong>
                                    <div>
                                        <img src="{{ asset('images/Contents/' . $contents->mobile_about_image) }}" alt="Mobile About Image" width="100">
                                    </div>
                                @endif
                            </p>
                            <a class="btn btn-primary me-3" href="{{ route('contents.edit', $contents->id) }}">
                                Edit
                            </a>
                           
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
