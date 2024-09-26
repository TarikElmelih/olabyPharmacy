@extends('admin.layouts.app')

@section('content')
<div class="container">
    <h1>Follow-Up Schedule Details</h1>
    <table class="table table-striped">
        <tr>
            <th>المعرف</th>
            <td>{{ $patientFollowUpSchedule->id }}</td>
        </tr>
        <tr>
            <th>التاريخ</th>
            <td>{{ $patientFollowUpSchedule->date }}</td>
        </tr>
        <tr>
            <th>القياس</th>
            <td>{{ $patientFollowUpSchedule->measurement }}</td>
        </tr>
        <tr>
            <th>الإجراءات المتخذة</th>
            <td>{{ $patientFollowUpSchedule->action_taken }}</td>
        </tr>
        <tr>
            <th>ملاحظات</th>
            <td>{{ $patientFollowUpSchedule->notes }}</td>
        </tr>
    </table>
    <a href="{{ route('admin.patient_follow_up_schedules.index') }}" class="btn btn-secondary">رجوع</a>
</div>
@endsection
