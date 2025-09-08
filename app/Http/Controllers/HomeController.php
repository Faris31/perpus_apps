<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\Borrows;
use App\Models\DetailBorrows;

class HomeController extends Controller
{
    public function index()
    {
        $totalBook = Book::count();
        $totalStock = Book::sum('stok_buku');

        // nyari dari detail_Book ada tidak buku yang sedang di pinjam, actual_date = null;
        // select * from detailBorrows join book on book.id = detail_borrow.id_book
        // join borrow on borrow.id = detail_borrows.id_borrow WHERE actual_date = null
        $diPinjam = DetailBorrows::with('book', 'borrow')->whereHas('borrow', function ($q) {
            $q->whereNull('actual_return_date');
        })->count();
        // $sisaDipinjam = 

        $returnBooks = Borrows::where('status', 0)->whereNotNull('actual_return_date')->count();
        $notReturnBooks = Borrows::where('status', 1)->whereNull('actual_return_date')->count();

        $fines = Borrows::with('member')->where('fine', '>', 0)->get();
        $totalFine = Borrows::sum('fine');
        return view('admin.dashboard', compact('totalBook', 'totalStock', 'diPinjam', 'returnBooks', 'notReturnBooks', 'fines', 'totalFine'));
    }
}
