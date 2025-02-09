<?php

namespace App\Http\Controllers\backend;

use App\Models\Buku;
use App\Models\User;
use App\Models\Kategori;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Categorie;
use App\Models\Livre;

class DashboardController extends Controller
{
    public function index()
    {

        $bookcount = Livre::count();
        $categorycount = Categorie::count();
        $usercount = User::count();
        if (auth()->user()->isUser()) {
            $books = Livre::whereHas('reservations', function ($query) {
                $query->where('user_id', auth()->id());
            })->with('categorie:id,name')->latest()->get();
        }else {
            $books = Livre::all();
        }
        return view('backend/dashboard', [
            'bookcount' => $bookcount,
            'categorycount' => $categorycount,
            'usercount' => $usercount,
            'latest_books' => $books,
            'latest_categories' => Categorie::all(),
            'latest_user' => User::all()
        ]);
    }
}
