@extends('app')
@section('title', 'Detail Peminjaman')
@section('content')
    <div class="row">
        <div align='right' class="col-sm-12 mb-3">
            <a href="{{ url()->previous() }}" class="btn btn-primary">
                <i class="bi bi-arrow-left"></i> Kembali
            </a>
        </div>
        <div class="col-sm-6">
            <div class="card">
                <div class="card-body">
                    <h3 class="card-title">Data Peminjam</h3>
                    <table class="table">
                        <tr>
                            <th>Nomor Transaksi</th>
                            <td>{{ $borrow->trans_number ?? '' }}</td>
                        </tr>
                        <tr>
                            <th>Tanggal Kembali</th>
                            <td>{{ \Carbon\Carbon::parse($borrow->return_date) ?? '' }}</td>
                        </tr>
                        <tr>
                            <th>Catatan</th>
                            <td>{{ $borrow->note ?? '' }}</td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-sm-6">
            <div class="card">
                <div class="card-body">
                    <h3 class="card-title">Data Anggota</h3>
                    <table class="table">
                        <tr>
                            <th>Nama Anggota</th>
                            <td>{{ $borrow->member->nama_anggota ?? '' }}</td>
                        </tr>
                        <tr>
                            <th>No HP</th>
                            <td>{{ $borrow->member->no_tlp ?? '' }}</td>
                        </tr>
                        <tr>
                            <th>Email</th>
                            <td>{{ $borrow->member->email ?? '' }}</td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-body">
                    <h3 class="card-title">Data Detail Peminjaman Buku</h3>
                    <table class="table table-bordered">
                        <thead class="text-center">
                            <tr>
                                <th>No</th>
                                <th>Judul</th>
                                <th>Penerbit</th>
                            </tr>
                        </thead>
                        <tbody class="text-center">
                            @foreach ($borrow->detailBorrow as $index => $detail)
                            <tr>
                                <td>{{ $index +=1 }}</td>
                                <td>{{ $detail->book->judul_buku }}</td>
                                <td>{{ $detail->book->penerbit_buku }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection