<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Buku;
use App\Models\Categorie;
use App\Models\Kategori;
use App\Models\Livre;
use App\Models\User;
use Illuminate\Http\Request;

class homeController extends Controller
{
    public function index()
    {
        $bookcount = Livre::count();
        $categorycount = Categorie::count();
        $usercount = User::count();
        $livres = Livre::with('categorie')->paginate(9);
        return view('frontend.index', compact('livres','bookcount','categorycount','usercount'));
    }

    public function library()
    {
        $livres = Livre::with('categorie')->paginate(9);
        return view('frontend.library', compact('livres'));
    }

    public function footer()
    {
        return view('frontend.footer', [
            'img_footer' => Buku::latest()->paginate(6)
        ]);
    }
}
