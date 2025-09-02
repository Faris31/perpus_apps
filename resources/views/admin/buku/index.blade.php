@extends('app')
@section('content')
@section('title', 'Buku')
<div class="row">
    <div class="col-sm-12">
        <div class="card">
            <div class="card-body">
                <h3 class="card-title">{{ $title ?? '' }}</h3>
                <div align="right" class="mb-3">
                    <a href=" {{ route('buku.create') }} " class="btn btn-primary">Tambah Buku</a>
                </div>
                <table class="table table-bordered">
                    <thead>
                        <tr class="text-center ">
                            <th>No</th>
                            <th>Lokasi Buku</th>
                            <th>Kategori Buku</th>
                            <th>Judul Buku</th>
                            <th>Pengarang</th>
                            <th>Penerbit</th>
                            <th>Tahun Terbit</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($books as $index => $buku )
                        <tr class="text-center align-content-center">
                            <td>{{$index += 1 }}</td>
                            <td>{{$buku->lokasi->kode_lokasi . '-' . $buku->lokasi->label . '-' . $buku->lokasi->rak}}</td>
                            <td>{{$buku->kategori->nama_kategori}}</td>
                            <td>{{$buku->judul_buku}}</td>
                            <td>{{$buku->pengarang_buku}}</td>
                            <td>{{$buku->penerbit_buku}}</td>
                            <td>{{$buku->tahun_terbit}}</td>
                            <td>
                                <a href="{{ route('buku.edit', $buku->id) }}" class="btn btn-success">Edit</a>
                                <form action=" {{ route('buku.delete', $buku->id) }} " method="post" onclick="return confirm('Ingin menghapus data?')"
                                    class="d-inline">
                                    @csrf
                                    @method('delete')
                                    <button class="btn btn-danger">Delete</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection