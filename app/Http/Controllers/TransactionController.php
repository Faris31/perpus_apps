<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Member;
use App\Models\Borrows;
use App\Models\Categorie;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title = 'Peminjaman Buku';
        return view('admin.pinjam.index', compact('title'));
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
            $lastNumber = (int)substr($lastTransaction->trans_number, 3);
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
            `id_anggota` => ['required'],
            `trans_number`,
            `return_date`
        ];
        return view('admin.pinjam.create', compact('title', 'members', 'categories', 'trans_number'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
       //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
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
        //
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
}
