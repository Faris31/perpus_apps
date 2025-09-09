@extends('app')
@section('title', 'Ubah Role')
@section('content')

<div class="row">
    <div class="col-sm-12">
        <div class="card">
            <div class="card-body">
                <h3 class="card-title">{{ $title ?? '' }}</h3>
                <form action=" {{ route('role.update', $edit->id) }} " method="post">
                    @csrf
                    @method('PUT')
                        <div class="mb-3">
                            <label for="name" class="form-label">Nama *</label>
                            <input type="text" class="form-control" name="name"
                                placeholder="silahkan masukan nama" value=" {{ $edit->name }} ">
                        </div>

                        <div class="mb-3">
                            <button class="btn btn-primary" type="submit" name="simpan">Simpan</button>
                            <a href="{{url()->previous()}}" class="text-muted">Kembali</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection