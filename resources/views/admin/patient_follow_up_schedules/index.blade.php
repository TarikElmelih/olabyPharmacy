@extends('admin.layouts.app')

@section('content')
<div class="container">
    <h1>جدول متابعة المريض</h1>
    <a href="{{ route('admin.patient_follow_up_schedules.create') }}" class="btn btn-primary">Create New Schedule</a>
    <table class="table table-striped mt-3">
        <thead>
            <tr>
                <th>المعرف</th>
                <th>اسم المريض</th>
                <th>البريد الالكتروني</th>
                <th>التاريخ</th>
                <th>القياس</th>
                <th> الإجراءات المتخذة</th>
                <th>نوع القياس</th>
                <th>عمليات</th>
            </tr>
        </thead>
        <tbody>
            @foreach($schedules as $schedule)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $schedule->user->name }}</td>
                    <td>{{ $schedule->user->email }}</td>
                    <td>{{ $schedule->date }}</td>
                    <td>{{ $schedule->measurement }}</td>
                    <td>{{ $schedule->action_taken }}</td>
                    <td>{{ $schedule->notes }}</td>
                    <td>
                        <a href="{{ route('admin.patient_follow_up_schedules.show', $schedule->id) }}" class="btn btn-info">View</a>
                        <a href="{{ route('admin.patient_follow_up_schedules.edit', $schedule->id) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('admin.patient_follow_up_schedules.destroy', $schedule->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">حذف</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
