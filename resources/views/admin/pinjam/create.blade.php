@extends('app')
@section('title', 'Peminjaman Buku')
@section('content')
    <div class="card">
        <div class="card-body">
            <h3 class="card-title">{{ $title ?? '' }}</h3>

            <form action="{{ route('transaction.store') }}" method="POST">
                @csrf
                <div class="row">
                    <div class="col-sm-6">
                        <div class=" mb-3 row">
                            <div class="col-sm-3">
                                <label for="" class="form-label">Nomor Transaksi</label>
                            </div>
                            <div class="col-sm-7">
                                <input type="text" class="form-control" name="trans_number" readonly value="{{ $trans_number ?? '' }}">
                            </div>
                        </div>
                        <div class=" mb-3 row">
                            <div class="col-sm-3">
                                <label for="" class="form-label">ID Anggota</label>
                            </div>
                            <div class="col-sm-7">
                                <select name="id_anggota" id="id_anggota" class="form-select">
                                    <option value="">-- Pilih Anggota --</option>
                                    @foreach ( $members as  $member)
                                    <option value="{{ $member->id }}">{{ $member->nama_anggota }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class=" mb-3 row">
                            <div class="col-sm-3">
                                <label for="" class="form-label">Kategori Buku</label>
                            </div>
                            <div class="col-sm-7">
                                <select name="id_kategori" id="id_kategori" class="form-select">
                                    <option value="">-- Pilih Kategori --</option>
                                    @foreach ( $categories as  $categorie)
                                    <option value="{{ $categorie->id }}">{{ $categorie->nama_kategori }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class=" mb-3 row">
                            <div class="col-sm-3">
                                <label for="buku" class="form-label">Buku</label>
                            </div>
                            <div class="col-sm-7">
                                <select name="id_buku" id="id_buku" class="form-select">
                                    <option value="">-- Pilih Buku --</option>
                                    <option value=""></option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class=" mb-3 row">
                            <div class="col-sm-3">
                                <label for="" class="form-label">Tanggal Pengembalian</label>
                            </div>
                            <div class="col-sm-7">
                                <input type="date" class="form-control" name="return_date">
                            </div>
                        </div>
                        <div class=" mb-3 row">
                            <div class="col-sm-3">
                                <label for="" class="form-label">Catatan</label>
                            </div>
                            <div class="col-sm-7">
                                <textarea name="note" id="note" class="form-control"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-12 mt-5">
                        <div class="mb-3" align='right'>
                            <button type="button" id='addRow' class="btn btn-sm btn-primary">
                                <i class="bi bi-plus-lg"></i> Tambah Row</button>
                        </div>
                        <table class="table table-bordered" id='tableTrans'>
                            <thead>
                                <tr class="text-center">
                                    <th>No</th>
                                    <th>Nama Buku</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody class="text-center"></tbody>
                        </table>
                        <button class="mt-3 btn btn-success">Simpan</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection

