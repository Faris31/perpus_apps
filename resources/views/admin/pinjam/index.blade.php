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
                        @foreach ($borrows as $index => $borrow)
                        <tr class="text-center flex-wrap align-content-center">
                            <td>{{ $index +=1 }}</td>
                            <td>{{ $borrow->trans_number }}</td>
                            <td>{{ $borrow->member->nama_anggota }}</td>
                            <td>{{ \Carbon\Carbon::parse($borrow->return_date)->format('d-M-Y') }}</td>
                            <td width='100px'>
                                <a href="{{ route('transaction.show', $borrow->id) }}" class="btn btn-success btn-sm">
                                    <i class="bi bi-eye"></i>
                                </a>
                                <form action="{{ route('transaction.destroy', $borrow->id) }}" onclick="return confirm('Ingin menghapus data?')"
                                    class="d-inline">
                                    @method('DELETE')
                                    <a href="{{ route('transaction.destroy', $borrow->id) }}" class="btn btn-danger btn-sm">
                                        <i class="bi bi-trash"></i>
                                    </a>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection