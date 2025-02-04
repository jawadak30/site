<?php

namespace App\Http\Controllers\backend;

use App\Models\Buku;
use App\Models\Kategori;
use Illuminate\Http\Request;
use App\Http\Requests\BookRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\BookUpdateRequest;

class BukuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('backend.buku.buku', [
            'bukus' => Buku::with('Kategori')->latest()->paginate(5),
            'kategoris' => Kategori::get()
        ]); //with buku maksudnya refer to relasi fungsi buku di model buku
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.buku.create', [
            'kategoris' => Kategori::get(),
            'bukus' => Buku::get()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BookRequest $request)
    {
        // return "ok";
        $data = $request->validated();
        $file = $request->file('cover');
        $filename = uniqid() . '.' . $file->getClientOriginalExtension();
        $file->storeAs('public/backend/', $filename);

        $data['cover'] = $filename;

        Buku::create($data);

        return redirect(url('buku'))->with('success', 'Data berhasil ditambah');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(string $id)
    {
        return view('backend.buku.buku', [
            'bukus' => Buku::find($id),
            'kategoris' => Kategori::get()
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('backend.buku.buku', [
            'v_bukus' => Buku::find($id),
            'kategoris' => Kategori::get()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(BookUpdateRequest $request, $id)
    {
        $data = $request->validated();

        if ($request->hasFile('cover')) {
            $file = $request->file('cover');
            $filename = uniqid() . '.' . $file->getClientOriginalExtension();
            $file->storeAs('public/backend/', $filename);
            //hapus gambar lama
            Storage::delete('public/backend/' . $request->oldImg);
            $data['cover'] = $filename;
        } else {
            $data['cover'] = $request->oldImg;
        }

        Buku::find($id)->update($data);
        return redirect(url('buku'))->with('success', 'Data berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Buku::find($id)->delete();
        return back()->with('success', 'Kategori berhasil dihapus');
    }
}
