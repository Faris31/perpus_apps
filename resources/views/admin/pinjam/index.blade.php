@extends('app')
@section('title', 'Data Peminjaman Buku')
@section('content')
    <div class="card">
        <div class="card-body">
            <h3 class="card-title">{{ $title ?? '' }}</h3>

            <div align='right' class="mb-3">
                <a href="{{ route('transaction.create') }}" class="btn btn-primary">
                    <i class="bi bi-plus-lg"></i> Tambah Peminjaman Buku</a>
            </div>
            
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <tr class="text-center align-content-center flex-wrap">
                            <th>No</th>
                            <th>Nomor Peminjaman</th>
                            <th>Anggota</th>
                            <th>Tanggal Kembali</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="text-center flex-wrap align-content-center">
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td width='100px'>
                                <a href="" class="btn btn-success btn-sm">
                                    <i class="bi bi-pencil"></i>
                                </a>
                                <a href="" class="btn btn-danger btn-sm">
                                    <i class="bi bi-trash"></i>
                                </a>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection