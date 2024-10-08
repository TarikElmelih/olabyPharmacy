<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use App\Models\Content;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ContentController extends Controller
{
    public function index(){
        $contents = Content::first();
        return view('admin.contents.index', compact('contents'));
    }

    public function create(){
        return view('admin.contents.create');
    }

    public function store(Request $request){
        $request->validate([
            'about_store' => 'required|string',
            'store_features' => 'required|string',
            'store_address' => 'required|string',
            'phone' => 'required|string',
            'email' => 'required|email',
            'facebook_link' => 'nullable|url',
            'whatsapp_link' => 'nullable|url',
            'instagram_link' => 'nullable|url',
            'homePage_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'aboutUs_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $data = $request->all();

        if ($request->hasFile('homePage_image')) {
            $data['homePage_image'] = $request->file('homePage_image')->store('images', 'public');
        }

        if ($request->hasFile('aboutUs_image')) {
            $data['aboutUs_image'] = $request->file('aboutUs_image')->store('images', 'public');
        }

        Content::create($data);
        return redirect()->route('contents.index')->with('success', 'Content created successfully.');
    }

    public function edit($id){
        $content = Content::findOrFail($id);
        return view('admin.contents.edit', compact('content'));
    }

public function update(Request $request, $id) {
    $request->validate([
        'about_store' => 'required|string',
        'store_features' => 'required|string',
        'store_address' => 'required|string',
        'phone' => 'required|string',
        'email' => 'required|email',
        'facebook_link' => 'nullable|url',
        'whatsapp_link' => 'nullable|url',
        'instagram_link' => 'nullable|url',
        'desktop_about_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        'mobile_about_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        'exchange_number' => 'required|numeric'
    ]);

    $content = Content::findOrFail($id);
    $data = $request->all();

    if ($request->hasFile('desktop_about_image')) {
        \Log::info('HomePage Image File Exists');
        // Delete old image if exists
        if ($content->desktop_about_image && file_exists(public_path('images/Contents/' . $content->desktop_about_image))) {
            unlink(public_path('images/Contents/' . $content->desktop_about_image));
        }
        $image = $request->file('desktop_about_image');
        $imageName = time() . '_' . $image->getClientOriginalName();
        $image->move(public_path('images/Contents'), $imageName);
        $data['desktop_about_image'] =  $imageName;
        \Log::info('Stored HomePage Image Path: ', [$data['desktop_about_image']]);
    }

    if ($request->hasFile('mobile_about_image')) {
        \Log::info('AboutUs Image File Exists');
        // Delete old image if exists
        if ($content->mobile_about_image && file_exists(public_path('images/Contents/' . $content->mobile_about_image))) {
            unlink(public_path('images/Contents/' . $content->mobile_about_image));
        }
        $image = $request->file('mobile_about_image');
        $imageName = time() . '_' . $image->getClientOriginalName();
        $image->move(public_path('images/Contents'), $imageName);
        $data['mobile_about_image'] =  $imageName;
        \Log::info('Stored AboutUs Image Path: ', [$data['mobile_about_image']]);
    }

    $content->update($data);
    return redirect()->route('contents.index')->with('success', 'Content updated successfully.');
}

    
    public function destroy($id){
        $content = Content::findOrFail($id);
        if ($content->homePage_image) {
            Storage::disk('public')->delete($content->homePage_image);
        }
        if ($content->aboutUs_image) {
            Storage::disk('public')->delete($content->aboutUs_image);
        }
        $content->delete();
        return redirect()->route('contents.index')->with('success', 'Content deleted successfully.');
    }
}
