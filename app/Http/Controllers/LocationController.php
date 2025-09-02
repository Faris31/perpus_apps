<?php

namespace App\Http\Controllers;

use App\Models\Location;
use Illuminate\Http\Request;
// use Illuminate\Support\Facades\Validator;


class LocationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $datas = Location::all();
        $title = 'Lokasi Buku';
        return view('admin.lokasi.index', compact('title', 'datas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $location = Location::all();
        $title = 'Tambah Lokasi Buku';
        return view('admin.lokasi.create', compact('title', 'location'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Location::create(
            [
                'kode_lokasi' => $request->kode_lokasi,
                'label' => $request->label,
                'rak' => $request->rak
            ]
        );

        // Location::create($request->all());
        return redirect()->to('lokasi/index');
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
}
