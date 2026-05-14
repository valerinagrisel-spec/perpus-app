<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Category;
use App\Models\Borrowing;

class DashboardController extends Controller
{
    public function index()
    {
        return view('dashboard', [
            'totalBooks' => Book::count(),
            'totalCategories' => Category::count(),
            'totalBorrowings' => Borrowing::count(),
        ]);
    }
}
