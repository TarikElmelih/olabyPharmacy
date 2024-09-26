@extends('admin.layouts.app')

@section('content')
<div class="container">
    <h1>إنشاء جدول متابعة جديد</h1>
    <form action="{{ route('admin.patient_follow_up_schedules.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="user_id">مستخدم</label>
            <select name="user_id" class="form-control" required>
                @foreach($users as $user)
                    <option value="{{ $user->id }}">{{ $user->name }} ({{ $user->email }})</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="date">التاريخ</label>
            <input type="date" name="date" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="measurement">قياس</label>
            <input type="text" name="measurement" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="action_taken">الإجراءات</label>
            <input type="text" name="action_taken" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="notes">نوع القياس</label>
            <textarea name="notes" class="form-control"></textarea>
        </div>
        <button type="submit" class="btn btn-primary">حفظ</button>
    </form>
</div>
@endsection
