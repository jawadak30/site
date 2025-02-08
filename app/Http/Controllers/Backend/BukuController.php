<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\BookRequest;
use App\Http\Requests\BookUpdateRequest;
use App\Models\Buku;
use App\Models\Categorie;
use App\Models\Kategori;
use App\Models\Livre;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class BukuController extends Controller
{
    public function index(): View
    {
        $categories = Categorie::select('id', 'name')->get();
        $books = Livre::with('categorie:id,name')->latest()->paginate(10);
        return view('backend.buku.buku', compact('books','categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    // public function create()
    // {
    //     return view('backend.buku.create', [
    //         'kategoris' => Kategori::get(),
    //         'bukus' => Buku::get()
    //     ]);
    // }


    public function store(BookRequest $request)
    {

        $data = $request->validated();
        $file = $request->file('cover');
        $filename = uniqid() . '.' . $file->getClientOriginalExtension();
        $file->storeAs('public/backend/', $filename);

        $data['cover'] = $filename;

        Buku::create($data);

        return redirect(url('buku'))->with('success', 'Data berhasil ditambah');
    }


    public function show(string $id)
    {
        return view('backend.buku.buku', [
            'bukus' => Buku::find($id),
            'kategoris' => Kategori::get()
        ]);
    }
        public function edit($id)
    {
        return view('backend.buku.buku', [
            'v_bukus' => Buku::find($id),
            'kategoris' => Kategori::get()
        ]);
    }

    public function update(Request $request, $id)
    {
        // Validate the incoming request
        $validated = $request->validate([
            'titre' => 'required|string|max:255', // Title
            'categorie_id' => 'required|exists:categories,id', // Category (make sure you have a categories table)
            'nbr_exemplaire' => 'required|integer|min:1', // Number of Copies
            'status' => 'required|string|max:255', // Status
            'date_edition' => 'required|date', // Publish Date
            'image1' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048', // Cover image validation
            'description' => 'nullable|string', // Description (optional)
            'oldImg' => 'nullable|string', // For old image
        ]);

        // Check if there's a new file for the cover
        if ($request->hasFile('image1')) {
            $file = $request->file('image1');
            $filename = uniqid() . '.' . $file->getClientOriginalExtension();
            $file->storeAs('public/backend/', $filename);

            // Delete the old image if it's not the same as the new one
            if ($request->oldImg && $request->oldImg !== $filename) {
                Storage::delete('public/backend/' . $request->oldImg);
            }

            // Update the image in the data
            $validated['image1'] = $filename;
        } else {
            // If no new image, keep the old one
            $validated['image1'] = $request->oldImg;
        }

        // Update the Livre model
        Livre::find($id)->update($validated);

        // Redirect with a success message
        return back()->with('success', 'Book successfully updated');
    }


    public function destroy($id)
    {
        $book = Livre::find($id);

        if ($book) {
            $book->delete();
            return redirect()->back()->with('success', 'Book successfully deleted');
        }

        return redirect()->back()->with('error', 'Book not found');
    }


}
