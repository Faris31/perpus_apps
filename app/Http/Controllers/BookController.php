<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Location;
use App\Models\Categorie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title = 'Buku';
        $books = Book::orderBy('id', 'desc')->get();
        return view('admin.buku.index', compact('books', 'title'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $locations = Location::all();
        $categories = Categorie::all();
        return view('admin.buku.create', compact('locations', 'categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $rullers = [
            'id_lokasi' => ['required'],
            'id_kategori' => ['required'],
            'judul_buku' => ['required'],
            'pengarang_buku' => ['required'],
            'penerbit_buku' => ['required'],
            'tahun_terbit' => ['required'],
            'keterangan' => ['nullable'],
            'stok_buku' => ['required']
        ];
        $validators = Validator::make($request->all(), $rullers);
        if ($validators->fails()) {
            return back()->withErrors($validators)->withInput();
        }

        Book::create([
            'id_lokasi' => $request->id_lokasi,
            'id_kategori' => $request->id_kategori,
            'judul_buku' => $request->judul_buku,
            'pengarang_buku' => $request->pengarang_buku,
            'penerbit_buku' => $request->penerbit_buku,
            'tahun_terbit' => $request->tahun_terbit,
            'keterangan' => $request->keterangan,
            'stok_buku' => $request->stok_buku
        ]);

        return redirect()->to('buku/index');
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
        $locations = Location::all();
        $categories = Categorie::all();
        $edit = Book::find($id);
        $title = 'Ubah Buku';
        return view('admin.buku.edit', compact('edit', 'title', 'locations', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $rullers = ([
            'id_lokasi' => ['required'],
            'id_kategori' => ['required'],
            'judul_buku' => ['required'],
            'pengarang_buku' => ['required'],
            'penerbit_buku' => ['required'],
            'tahun_terbit' => ['required'],
            'keterangan' => ['nullable'],
            'stok_buku' => ['required']
        ]);
        $validators = Validator::make($request->all(), $rullers);
        if ($validators->fails()) {
            return back()->withErrors($validators)->withInput();
        }

        $data = [
            'id_lokasi' => $request->id_lokasi,
            'id_kategori' => $request->id_kategori,
            'judul_buku' => $request->judul_buku,
            'pengarang_buku' => $request->pengarang_buku,
            'penerbit_buku' => $request->penerbit_buku,
            'tahun_terbit' => $request->tahun_terbit,
            'keterangan' => $request->keterangan,
            'stok_buku' => $request->stok_buku
        ];

        Book::where('id', $id)->update($data);
        return redirect()->to('buku/index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $book = Book::find($id);
        $book->delete();
        return redirect()->to('buku/index');
    }
}
