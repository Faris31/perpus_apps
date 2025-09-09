@extends('app')
@section('content')
@section('title', 'Data Role')
<div class="row">
    <div class="col-sm-12">
        <div class="card">
            <div class="card-body">
                <h3 class="card-title">{{ $title ?? '' }}</h3>
                <div align="right" class="mb-3">
                    <a href=" {{ route('role.create') }} " class="btn btn-primary">Tambah Data Role</a>
                </div>
                <table class="table table-bordered">
                    <thead>
                        <tr class="text-center">
                            <th style="width: 200px">No</th>
                            <th>Nama</th>
                            <th style="width: 200px">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($roles as $index => $role )
                        <tr class="text-center align-content-center">
                            <td>{{$index += 1 }}</td>
                            <td>{{$role->name}}</td>
                            <td>
                                <a href="{{ route('role.edit', $role->id) }}" class="btn btn-success">Edit</a>
                                <form action=" {{ route('role.destroy', $role->id) }} " method="post" onclick="return confirm('Ingin menghapus data?')"
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