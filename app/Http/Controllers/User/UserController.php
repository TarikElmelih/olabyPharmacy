<?php

namespace App\Http\Controllers\User;

use App\Models\PatientFollowUpSchedule;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        // Get the currently authenticated user's ID
        $userId = Auth::id();

        // Fetch only the schedules associated with the authenticated user
        $schedules = PatientFollowUpSchedule::where('user_id', $userId)->get();

        // Pass the schedules to the view
        return view('dashboard', compact('schedules'));
    }
}
