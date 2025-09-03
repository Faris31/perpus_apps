@extends('app')
@section('title', 'Lokasi Buku')
@section('content')
<div class="row">
    <div class="col-sm-12">
        <div class="card">
            <div class="card-body">
                <h3 class="card-title">{{ $title ?? '' }}</h3>
                <div align="right" class="mb-3">
                    <a href=" {{ route('lokasi.create') }} " class="btn btn-primary">Tambah Lokasi Buku</a>
                </div>
                <table class="table table-bordered">
                    <thead>
                        <tr class="text-center ">
                            <th>No</th>
                            <th>Kode Lokasi</th>
                            <th>Label Buku</th>
                            <th>Rak Buku</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($datas as $index => $data )
                        <tr class="text-center align-content-center">
                            <td>{{$index += 1 }}</td>
                            <td>{{$data->kode_lokasi}}</td>
                            <td>{{$data->label}}</td>
                            <td>{{$data->rak}}</td>
                            <td>
                                <a href="{{ route('lokasi.edit', $data->id) }}" class="btn btn-success">Edit</a>
                                <form action=" {{ route('lokasi.delete', $data->id) }} " method="post" onclick="return confirm('Ingin menghapus data?')"
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