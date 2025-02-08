<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Categorie;
use App\Models\Kategori;
use Illuminate\Http\Request;

class KategoriController extends Controller
{
    /**
     * Display a listing of the resource.
     *



     */
    public function index()
    {
        $categories = Categorie::paginate(10); // 10 is the number of items per page

        return response()->view('backend.kategori.kategori', compact('categories'));
    }


    public function store(Request $request)
    {
        // Validate the input
        $data = $request->validate([
            'name' => 'required|min:2|max:255' // Matching the field name and validation rule
        ]);

        // Create a new category
        Categorie::create($data);

        // Redirect back with success message
        return back()->with('success', 'New category has been created');
    }

    public function update(Request $request, $id)
    {
        // Validate the input
        $data = $request->validate([
            'name' => 'required|min:2|max:255', // 'name' matches the field in your 'categories' table // 'description' is optional, but with a limit on length
        ]);

        // Find the category by ID and update it
        $category = Categorie::find($id);
        if ($category) {
            $category->update($data);

            // Redirect back with a success message
            return back()->with('success', 'Category has been updated successfully');
        }

        // If the category is not found
        return back()->with('error', 'Category not found');
    }



    public function destroy($id)
    {
        // Find the category by ID
        $category = Categorie::find($id);

        if ($category) {
            // Soft delete the category
            $category->delete();

            // Redirect back with a success message
            return back()->with('success', 'Category has been deleted successfully');
        }

        // If category not found, return with an error message
        return back()->with('error', 'Category not found');
    }

}
