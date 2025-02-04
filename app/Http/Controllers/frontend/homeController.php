<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Buku;
use App\Models\Kategori;
use App\Models\User;
use Illuminate\Http\Request;

class homeController extends Controller
{
    public function index()
    {
        $bookcount = Buku::count();
        $categorycount = Kategori::count();
        $usercount = User::count();
        return view('frontend.index', [
            'latest_post' => Buku::latest()->paginate(6),
            'img_footer' => Buku::latest()->paginate(6),
            'bookcount' => $bookcount,
            'categorycount' => $categorycount,
            'usercount' => $usercount
        ]);
    }

    public function library()
    {
        return view('frontend.library', [
            'latest_posts' => Buku::latest()->paginate(6),
            'img_footer' => Buku::latest()->paginate(6)
        ]);
    }

    public function footer()
    {
        return view('frontend.footer', [
            'img_footer' => Buku::latest()->paginate(6)
        ]);
    }
}
