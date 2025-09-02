@extends('app')
@section('title', 'Ubah Buku')
@section('content')

<div class="row">
    <div class="col-sm-12">
        <div class="card">
            <div class="card-body">
                <h3 class="card-title">{{ $title ?? '' }}</h3>
                <form action=" {{ route('buku.update', $edit->id) }} " method="post">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="mb-3">
                            <label for="id_lokasi" class="form-label">Lokasi Buku *</label>
                           <select name="id_lokasi" id="id_lokasi" class="form-select">
                               <option value="">-- Pilih Lokasi --</option>
                            @foreach ( $locations as $item )
                                <option {{$item->id == $edit->id_lokasi ? 'selected' : '' }} value="{{$item->id}}">{{ $item->kode_lokasi . '-' . $item->label . '-' . $item->rak }}</option>
                            @endforeach
                           </select>
                        </div>
                        <div class="mb-3">
                            <label for="kode_lokasi" class="form-label">Kategori Buku *</label>
                            <select name="id_kategori" id="id_kategori" class="form-select">
                                <option value="">-- Pilih Kategori --</option>
                            @foreach ( $categories as $item )
                                <option {{$item->id == $edit->id_kategori ? 'selected' : '' }} value="{{$item->id}}">{{ $item->nama_kategori }}</option>
                            @endforeach
                           </select>
                        </div>
                        <div class="mb-3">
                            <label for="judul_buku" class="form-label">Judul Buku *</label>
                            <input type="text" class="form-control" name="judul_buku" placeholder="silahkan masukan judul buku" value="{{ $edit->judul_buku }}">
                        </div>
                        <div class="mb-3">
                            <label for="pengarang_buku" class="form-label">Pengarang Buku *</label>
                            <input type="text" class="form-control" name="pengarang_buku"
                                placeholder="silahkan masukan pengarang buku"  value="{{ $edit->pengarang_buku }}">
                        </div>
                        <div class="mb-3">
                            <label for="penerbit_buku" class="form-label">Penerbit Buku *</label>
                            <input type="text" class="form-control" name="penerbit_buku"
                                placeholder="silahkan masukan penerbit buku"  value="{{ $edit->penerbit_buku }}">
                        </div>
                        <div class="mb-3">
                            <label for="tahun_terbit" class="form-label">Tahun Terbit Buku *</label>
                            <input type="date" class="form-control" name="tahun_terbit"
                                placeholder="silahkan masukan tahun terbit buku"  value="{{ $edit->tahun_terbit }}">
                        </div>
                        <div class="mb-3">
                            <label for="keterangan" class="form-label">Keterangan *</label>
                            <input type="text" class="form-control" name="keterangan"
                                placeholder="silahkan masukan keterangan buku"  value="{{ $edit->keterangan }}">
                        </div>
                        <div class="mb-3">
                            <label for="stok_buku" class="form-label">Stok Buku *</label>
                            <input type="number" min="1" max="1000" class="form-control" name="stok_buku"
                                placeholder="silahkan masukan stok buku"  value="{{ $edit->stok_buku }}">
                        </div>

                        <div class="mb-3">
                            <button class="btn btn-primary" type="submit" name="simpan">Submit</button>
                            <a href="{{url()->previous()}}" class="text-muted">Kembali</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection