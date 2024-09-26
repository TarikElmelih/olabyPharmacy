@extends('admin.layouts.app')
@section('title', 'users')


@section('content')

<div class="container">


    <h1>المستخدمين</h1>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>المعرف</th>
                <th>اسم المستخدم</th>
                <th>البريد الالكتروني</th>
                <th>تاريخ الإنشاء</th>
                <th>تاريخ التعديل</th>
            </tr>
        </thead>
        <tbody>
            @foreach($users as $user)
                <tr>
                    <td>{{ $user->id }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->created_at }}</td>
                    <td>{{ $user->updated_at }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>


@endsection
