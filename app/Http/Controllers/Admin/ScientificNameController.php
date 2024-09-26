<?php
// app/Http/Controllers/Admin/ScientificNameController.php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ScientificName;

class ScientificNameController extends Controller
{
    public function index()
    {
        $scientificNames = ScientificName::all();
        return view('admin.scientific_names.index', compact('scientificNames'));
    }
    
     public function showProducts($id)
    {   
        $all_ScientificNames = ScientificName::all();
        $ScientificName = ScientificName::find($id);
        $products = $ScientificName->products; // Assuming a ScientificName has many Products
        return view('front.product_scientific_name', compact('ScientificName', 'products','all_ScientificNames'));
    }
    public function create()
    {
        return view('admin.scientific_names.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        ScientificName::create([
            'name' => $request->name,
        ]);

        return redirect()->route('admin.scientific_names.index')
            ->with('success', 'Scientific Name created successfully.');
    }

    public function show($id)
    {
        $scientificName = ScientificName::findOrFail($id);
        return view('admin.scientific_names.show', compact('scientificName'));
    }

    public function edit($id)
    {
        $scientificName = ScientificName::findOrFail($id);
        return view('admin.scientific_names.edit', compact('scientificName'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $scientificName = ScientificName::findOrFail($id);
        $scientificName->update([
            'name' => $request->name,
        ]);

        return redirect()->route('admin.scientific_names.index')
            ->with('success', 'Scientific Name updated successfully.');
    }

    public function destroy($id)
    {
        $scientificName = ScientificName::findOrFail($id);
        $scientificName->delete();

        return redirect()->route('admin.scientific_names.index')
            ->with('success', 'Scientific Name deleted successfully.');
    }
}
