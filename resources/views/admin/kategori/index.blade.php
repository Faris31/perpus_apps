@extends('app')
@section('content')
@section('title', 'Kategori Buku')
<div class="row">
    <div class="col-sm-12">
        <div class="card">
            <div class="card-body">
                <h3 class="card-title">{{ $title ?? '' }}</h3>
                <div align="right" class="mb-3">
                    <a href=" {{ route('kategori.create') }} " class="btn btn-primary">Tambah Kategori Buku</a>
                </div>
                <table class="table table-bordered">
                    <thead>
                        <tr class="text-center ">
                            <th style="width: 200px">No</th>
                            <th>Kategori</th>
                            <th style="width: 200px">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($datas as $index => $data )
                        <tr class="text-center align-content-center">
                            <td>{{$index += 1 }}</td>
                            <td>{{$data->nama_kategori}}</td>
                            <td>
                                <a href="{{ route('kategori.edit', $data->id) }}" class="btn btn-success">Edit</a>
                                <form action=" {{ route('kategori.delete', $data->id) }} " method="post" onclick="return confirm('Ingin menghapus data?')"
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