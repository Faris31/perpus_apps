@extends('app')
@section('content')
@section('title', 'Manage Anggota')
<div class="row">
    <div class="col-sm-12">
        <div class="card">
            <div class="card-body">
                <h3 class="card-title">{{ $title ?? '' }}</h3>
                <div align="right" class="mb-3">
                    <a href="{{route('anggota.create')}}" class="btn btn-primary">Tambah Anggota</a>
                    <a href="{{route('anggota.restore')}}" class="btn btn-warning">Restore</a>
                </div>
                <table class="table table-bordered">
                    <thead>
                        <tr class="text-center ">
                            <th>No</th>
                            <th>Nomor Anggota</th>
                            <th>NIK</th>
                            <th>Nama Anggota</th>
                            <th>Nomor Telepon</th>
                            <th>Email</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($member as $index => $data )
                        <tr class="text-center align-content-center">
                            <td>{{$index += 1 }}</td>
                            <td>{{$data->nomor_anggota}}</td>
                            <td>{{$data->nik}}</td>
                            <td>{{$data->nama_anggota}}</td>
                            <td>{{$data->no_tlp}}</td>
                            <td>{{$data->email}}</td>
                            <td>
                                <a href="{{ route('anggota.edit', $data->id) }}" class="btn btn-success">Edit</a>
                                <form action=" {{ route('anggota.softdelete', $data->id) }} " method="post" onclick="return confirm('Ingin menghapus data?')"
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