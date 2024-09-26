@extends('admin.layouts.app')

@section('content')
<div class="container">
    <h1>تعديل جدول المتابعة</h1>
    <form action="{{ route('admin.patient_follow_up_schedules.update', $patientFollowUpSchedule->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="date">التاريخ</label>
            <input type="date" name="date" class="form-control" value="{{ $patientFollowUpSchedule->date }}" required>
        </div>
        <div class="form-group">
            <label for="measurement">قياس</label>
            <input type="text" name="measurement" class="form-control" value="{{ $patientFollowUpSchedule->measurement }}" required>
        </div>
        <div class="form-group">
            <label for="action_taken">الإجراءات</label>
            <input type="text" name="action_taken" class="form-control" value="{{ $patientFollowUpSchedule->action_taken }}" required>
        </div>
        <div class="form-group">
            <label for="notes">ملاحظات</label>
            <textarea name="notes" class="form-control">{{ $patientFollowUpSchedule->notes }}</textarea>
        </div>
        <button type="submit" class="btn btn-primary">تحديث</button>
    </form>
</div>
@endsection
