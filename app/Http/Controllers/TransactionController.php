<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Member;
use App\Models\Borrows;
use App\Models\Categorie;
use Illuminate\Http\Request;
use App\Models\DetailBorrows;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;


class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title = 'Peminjaman Buku';
        $borrows = Borrows::with('member', 'detailBorrow')->orderBy('id', 'desc')->get();
        return view('admin.pinjam.index', compact('title', 'borrows'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // kode PJM-today-001
        $kode = 'PJM';
        $today = Carbon::now()->format('Ymd');
        $prefix = $kode . '-' . $today;
        $lastTransaction = Borrows::whereDate('created_at', Carbon::today())->orderBy('id', 'desc')->first();

        if($lastTransaction){
            $lastNumber = (int)substr($lastTransaction->trans_number, -3);
            $newNumber = str_pad($lastNumber + 1, 3, "0", STR_PAD_LEFT);
        } else {
            $newNumber = '001';
        }

        $trans_number = $prefix . $newNumber;

        $title = 'Peminjaman Buku';
        $members = Member::get();
        $categories = Categorie::get();
        // $books = Book::get();
        $rules = [
            'id_anggota' => ['required'],
            'trans_number',
            'return_date',
            'note'
        ];
        return view('admin.pinjam.create', compact('title', 'members', 'categories', 'trans_number'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        DB::beginTransaction();
        try {
            $insertBorrow = Borrows::create([
                'id_anggota' => $request->id_anggota,
                'trans_number' => $request->trans_number,
                'return_date' => $request->return_date,
                'note' => $request->note,
            ]);

            foreach ($request->id_buku as $key => $value) {
                DetailBorrows::create([
                    'id_borrow' => $insertBorrow->id,
                    'id_book' => $request->id_buku[$key],
                ]);
            };

            DB::commit();
            Alert::success('Berhasil!!', 'Transaksi berhasil di buat');
            return redirect()->route('print-peminjam', ['id' => $insertBorrow->id]);
        } catch (\Throwable $th) {
            DB::rollBack();
            Alert::error('upss!', $th->getMessage());
        }
        return redirect()->to('transaction');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $title = 'Detail Peminjaman';
        $borrow = Borrows::with('detailBorrow.book', 'member')->find($id);
        return view('admin.pinjam.show', compact('borrow', 'title'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $borrows = Borrows::find($id);
        $borrows->detailBorrow()->delete();
        $borrows->delete();
        return redirect()->to('transaction');
    }

    public function getBukuByIdCategory($id_category)
    {
    try {
        $books = Book::where('id_kategori', $id_category)->get();
        return response()->json(['status'=> 'success', 'message'=>'fetch book success', 'data'=>$books]);
    } catch (\Throwable $th) {
        return response()->json(['status'=>'erros', 'message'=>$th->getMessage()], 500);
    }
    }

    public function print($id_borrow)
    {
        $borrow = Borrows::with('member', 'detailBorrow.book')->find($id_borrow);
        return view('admin.pinjam.print', compact('borrow'));
    }

    public function returnBook(Request $request, $id)
    {
        $borrow = Borrows::findOrFail($id); // 404
        // $borrow = Borrows::find($id); // blank

        if (!$borrow->actual_return_date) {
            $borrow->actual_return_date = Carbon::now();
        }

        $returnDate = \Carbon\Carbon::parse($borrow->return_date)->startOfDay();
        $actualReturnDate = \Carbon\Carbon::parse($borrow->actual_return_date)->startOfDay();

        //lebih besar
        // if($actualReturnDate > $returnDate)
        // greaterThan
        $fine = 0;
        if ($actualReturnDate->greaterThan($returnDate)) {
            // actualDate * total_denda
            $late = $returnDate->diffInDays($actualReturnDate);
            $fine = $late * 10000;
        }
        // $borrow->actual_return_date = now();
        // $borrow->$actualReturnDate = Carbon::now();
        $borrow->fine = $fine;
        $borrow->status = 0;
        $borrow->save();
        Alert::success('Berhasil', 'Buku Berhasil dikembalikan');
        return redirect()->to('transaction');
    }
}
