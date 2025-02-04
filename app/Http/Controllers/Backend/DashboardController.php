<?php

namespace App\Http\Controllers\backend;

use App\Models\Buku;
use App\Models\User;
use App\Models\Kategori;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function index()
    {
        $bookcount = Buku::count();
        $categorycount = Kategori::count();
        $usercount = User::count();
        return view('backend/dashboard', [
            'bookcount' => $bookcount,
            'categorycount' => $categorycount,
            'usercount' => $usercount,
            'latest_books' => Buku::latest()->paginate(),
            'latest_categories' => Kategori::latest()->paginate(),
            'latest_user' => User::latest()->paginate()
        ]);
    }
}
