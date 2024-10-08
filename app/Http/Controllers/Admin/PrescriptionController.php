<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\prescription;
use Illuminate\Http\Request;

class PrescriptionController extends Controller
{

    public function index(){
        $requests = prescription::all();
        return view('admin.prescription.index', compact('requests'));
    }
    public function create()
    {
        return view('front.prescription');
    }

    public function store(Request $request)
    {
        $request->validate([
            'drug_name' => 'required|string|max:255',
            'drug_image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'drug_description' => 'required|string',
            'customer_name' => 'required|string|max:255',
            'customer_phone' => 'required|string|max:20',
            'customer_email' => 'required|email|max:255',
        ]);

        // Handle file upload
        if ($request->hasFile('drug_image')) {
            $imageName = time().'.'.$request->drug_image->extension();
            $request->drug_image->move(public_path('images'), $imageName);
        }

        // Save form data to the database
        prescription::create([
            'drug_name' => $request->drug_name,
            'drug_image' => $imageName,
            'drug_description' => $request->drug_description,
            'customer_name' => $request->customer_name,
            'customer_phone' => $request->customer_phone,
            'customer_email' => $request->customer_email,
        ]);

        return redirect()->back()->with('success', 'طلبك قد تم إرساله بنجاح');
    }
}
