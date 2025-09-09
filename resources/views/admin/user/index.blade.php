@extends('app')
@section('content')
@section('title', 'Data User')
<div class="row">
    <div class="col-sm-12">
        <div class="card">
            <div class="card-body">
                <h3 class="card-title">{{ $title ?? '' }}</h3>
                <div align="right" class="mb-3">
                    <a href=" {{ route('user.create') }} " class="btn btn-primary">
                        <i class="bi bi-plus"></i> Tambah Data User</a>
                </div>
                <table class="table table-bordered">
                    <thead>
                        <tr class="text-center">
                            <th style="width: 100px">No</th>
                            <th>Nama</th>
                            <th>Email</th>
                            <th>Role</th>
                            <th style="width: 350px">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $index => $user )
                        <tr>
                            <td class="text-center align-content-center">{{$index += 1 }}</td>
                            <td class="text-center align-content-center">{{$user->name}}</td>
                            <td class="text-center align-content-center">{{$user->email}}</td>
                            <td class="text-center align-content-center">
                                {{-- <ul class="list-unstyled"> --}}
                                    @foreach ($user->roles as $role)
                                    <span class="badge text-bg-primary">{{$role->name}}</span>
                                    {{-- <li>{{$role->name}}</li> --}}
                                    @endforeach
                                {{-- </ul> --}}
                            </td>
                            <td class="text-center align-content-center">
                                <a href="{{ route('user.roles', $user->id) }}" class="btn btn-primary">Tambah Role</a>
                                <a href="{{ route('user.edit', $user->id) }}" class="btn btn-success">Edit</a>
                                <form action=" {{ route('user.destroy', $user->id) }} " method="post"
                                    onclick="return confirm('Ingin menghapus data?')" class="d-inline">
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