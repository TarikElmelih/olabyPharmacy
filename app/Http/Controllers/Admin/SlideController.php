<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Slide;


class SlideController extends Controller
{
    // Display a listing of the slides
    public function index()
    {
        $slides = Slide::all();
        return view('admin.slides.index', compact('slides'));
    }

    // Show the form for creating a new slide
    public function create()
    {
        return view('admin.slides.create');
    }

   // Store a newly created slide in storage
public function store(Request $request)
{
    $request->validate([
        'title' => 'required|string|max:255',
        'description' => 'nullable|string',
        'button_text' => 'nullable|string|max:255',
        'button_link' => 'nullable|string|max:255',
        'desktop_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        'mobile_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
    ]);

    $slide = new Slide();
    $slide->title = $request->title;
    $slide->description = $request->description;
    $slide->button_text = $request->button_text;
    $slide->button_link = $request->button_link;

    if ($request->hasFile('desktop_image')) {
        $file = $request->file('desktop_image');
        $filename = time() . '-' . $file->getClientOriginalName();
        $file->move(public_path('images/slides'), $filename);
        $slide->desktop_image = $filename;
    }

    if ($request->hasFile('mobile_image')) {
        $file = $request->file('mobile_image');
        $filename = time() . '-' . $file->getClientOriginalName();
        $file->move(public_path('images/slides'), $filename);
        $slide->mobile_image = $filename;
    }

    $slide->save();

    return redirect()->route('admin.slides.index')->with('success', 'Slide created successfully.');
}

    // Display the specified slide
    public function show(Slide $slide)
    {
        return view('admin.slides.show', compact('slide'));
    }

    // Show the form for editing the specified slide
    public function edit(Slide $slide)
    {
        return view('admin.slides.edit', compact('slide'));
    }

    // Update the specified slide in storage
public function update(Request $request, Slide $slide)
{
    $request->validate([
        'title' => 'required|string|max:255',
        'description' => 'nullable|string',
        'button_text' => 'nullable|string|max:255',
        'button_link' => 'nullable|string|max:255',
        'desktop_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        'mobile_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
    ]);

    $slide->title = $request->title;
    $slide->description = $request->description;
    $slide->button_text = $request->button_text;
    $slide->button_link = $request->button_link;

    if ($request->hasFile('desktop_image')) {
        $file = $request->file('desktop_image');
        $filename = time() . '-' . $file->getClientOriginalName();
        $file->move(public_path('images/slides'), $filename);
        $slide->desktop_image = $filename;
    }

    if ($request->hasFile('mobile_image')) {
        $file = $request->file('mobile_image');
        $filename = time() . '-' . $file->getClientOriginalName();
        $file->move(public_path('images/slides'), $filename);
        $slide->mobile_image = $filename;
    }

    $slide->save();

    return redirect()->route('admin.slides.index')->with('success', 'Slide updated successfully.');
}
    // Remove the specified slide from storage
    public function destroy(Slide $slide)
    {
        $slide->delete();
        return redirect()->route('admin.slides.index')->with('success', 'Slide deleted successfully.');
    }
}