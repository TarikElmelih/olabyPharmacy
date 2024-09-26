@extends('admin.layouts.app')

@section('content')
<div class="container">
    <h1>Patient Follow-Up Schedules</h1>
    <a href="{{ route('patient_follow_up_schedules.create') }}" class="btn btn-primary">Create New Schedule</a>
    <table class="table table-striped mt-3">
        <thead>
            <tr>
                <th>ID</th>
                <th>User Name</th>
                <th>Email</th>
                <th>Date</th>
                <th>Measurement</th>
                <th>Action Taken</th>
                <th>Notes</th>
                <th>Actions</th>
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
                        <a href="{{ route('patient_follow_up_schedules.show', $schedule->id) }}" class="btn btn-info">View</a>
                        <a href="{{ route('patient_follow_up_schedules.edit', $schedule->id) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('patient_follow_up_schedules.destroy', $schedule->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
