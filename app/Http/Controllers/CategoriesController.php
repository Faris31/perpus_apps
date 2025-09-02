<?php

namespace App\Http\Controllers;

use App\Models\Categorie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $datas = Categorie::all();
        $title = 'Kategori Buku';
        return view('admin.kategori.index', compact('title', 'datas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categorie = Categorie::all();
        $title = 'Tambah Kategori Buku';
        return view('admin.kategori.create', compact('title', 'categorie'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Categorie::create([
            'nama_kategori' => $request->nama_kategori
        ]);

        return redirect()->to('kategori/index');
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
        $edit = Categorie::find($id);
        $title = 'Ubah Kategori Buku';
        return view('admin.kategori.edit', compact('edit', 'title'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $rules = ([
            'nama_kategori' => ['required']
        ]);
        $validators = Validator::make($request->all(), $rules);
        if ($validators->fails()) {
            return back()->withErrors($validators)->withInput();
        };

        $data = [
            'nama_kategori' => $request->nama_kategori
        ];

        Categorie::where('id', $id)->update($data);
        return redirect()->to('kategori/index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $location = Categorie::find($id);
        $location->delete();
        return redirect()->to('kategori/index');
    }
}
