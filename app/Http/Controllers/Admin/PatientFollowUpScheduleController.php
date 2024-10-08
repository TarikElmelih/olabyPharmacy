<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PatientFollowUpSchedule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PatientFollowUpScheduleController extends Controller
{
    public function index()
    {
        $schedules = PatientFollowUpSchedule::with('user')->get();
        return view('admin.patient_follow_up_schedules.index', compact('schedules'));
    }

    public function create()
    {
        $users = \App\Models\User::where('usertype', '!=', 'admin')->get(); // Fetch all users
        return view('admin.patient_follow_up_schedules.create', compact('users'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'date' => 'required|date',
            'measurement' => 'required|string|max:255',
            'action_taken' => 'required|string|max:255',
            'notes' => 'nullable|string',
        ]);
    
        PatientFollowUpSchedule::create([
            'user_id' => $request->user_id,
            'date' => $request->date,
            'measurement' => $request->measurement,
            'action_taken' => $request->action_taken,
            'notes' => $request->notes,
        ]);

        return redirect()->route('admin.patient_follow_up_schedules.index');
    }

    public function show(PatientFollowUpSchedule $patientFollowUpSchedule)
    {
       
        return view('admin.patient_follow_up_schedules.show', compact('patientFollowUpSchedule'));
    }

    public function edit(PatientFollowUpSchedule $patientFollowUpSchedule)
    {
       
        return view('admin.patient_follow_up_schedules.edit', compact('patientFollowUpSchedule'));
    }

    public function update(Request $request, PatientFollowUpSchedule $patientFollowUpSchedule)
    {
       

        $request->validate([
            'date' => 'required|date',
            'measurement' => 'required|string|max:255',
            'action_taken' => 'required|string|max:255',
            'notes' => 'nullable|string',
        ]);

        $patientFollowUpSchedule->update($request->all());

        return redirect()->route('admin.patient_follow_up_schedules.index');
    }

    public function destroy(PatientFollowUpSchedule $patientFollowUpSchedule)
    {
       
        $patientFollowUpSchedule->delete();

        return redirect()->route('admin.patient_follow_up_schedules.index');
    }
}
