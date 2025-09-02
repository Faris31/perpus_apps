<?php

namespace App\Http\Controllers;

use App\Models\Location;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
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
        $edit = Location::find($id);
        $title = 'Ubah Lokasi';
        return view('admin.lokasi.edit', compact('edit', 'title'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $rules = ([
            'kode_lokasi' => ['required'],
            'label' => ['required', 'string'],
            'rak' => ['required']
        ]);
        $validators = Validator::make($request->all(), $rules);
        if ($validators->fails()) {
            return back()->withErrors($validators)->withInput();
        };

        $data = [
            'kode_lokasi' => $request->kode_lokasi,
            'label' => $request->label,
            'rak' => $request->rak
        ];

        Location::where('id', $id)->update($data);
        // $location = Location::find($id);
        // $location->kode_lokasi = $request->kode_lokasi;
        // $location->label = $request->label;
        // $location->rak = $request->rak;
        // $location->save();


        return redirect()->to('lokasi/index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $location = Location::find($id);
        $location->delete();
        return redirect()->to('lokasi/index');
    }
}
