@extends('admin.layouts.app')

@section('title', 'لوحة التحكم')

@section('content')
<div class="container">
    <h2 class="mb-4">طلبات الراشيتة</h2>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>#</th>
                <th>اسم الدواء</th>
                <th>صورة الدواء</th>
                <th>وصف الدواء</th>
                <th>اسم الزبون</th>
                <th>رقم الهاتف</th>
                <th>البريد الإلكتروني</th>
                <th>تاريخ الإنشاء</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($requests as $request)
                <tr>
                    <td>{{ $request->id }}</td>
                    <td>{{ $request->drug_name }}</td>
                    <td><img src="{{ asset('images/' . $request->drug_image) }}" alt="Drug Image" width="50"></td>
                    <td>{{ $request->drug_description }}</td>
                    <td>{{ $request->customer_name }}</td>
                    <td>{{ $request->customer_phone }}</td>
                    <td>{{ $request->customer_email }}</td>
                    <td>{{ $request->created_at }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
