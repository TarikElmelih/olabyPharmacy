
@extends('admin.layouts.app')

@section('title', 'لوحة التحكم')

@section('content')
<div class="page-wrapper">
    <div class="content">
      <div class="row">

        <div class="col-lg-3 col-sm-6 col-12 d-flex">
          <div class="dash-count">
            <div class="dash-counts">
              <h4>100</h4>
              <h5>عميل</h5>
            </div>
            <div class="dash-imgs">
              <i data-feather="user"></i>
            </div>
          </div>
        </div>
        <div class="col-lg-3 col-sm-6 col-12 d-flex">
          <div class="dash-count das1">
            <div class="dash-counts">
              <h4>100</h4>
              <h5>الموردين</h5>
            </div>
            <div class="dash-imgs">
              <i data-feather="user-check"></i>
            </div>
          </div>
        </div>
        <div class="col-lg-3 col-sm-6 col-12 d-flex">
          <div class="dash-count das2">
            <div class="dash-counts">
              <h4>100</h4>
              <h5>فاتورة شراء</h5>
            </div>
            <div class="dash-imgs">
              <i data-feather="file-text"></i>
            </div>
          </div>
        </div>

      </div>


    </div>
  </div>

@endsection
