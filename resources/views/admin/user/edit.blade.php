@extends('app')
@section('title', 'Ubah User')
@section('content')

<div class="row">
    <div class="col-sm-12">
        <div class="card">
            <div class="card-body">
                <h3 class="card-title">{{ $title ?? '' }}</h3>
                <form action=" {{ route('user.update', $edit->id) }} " method="post">
                    @csrf
                    @method('PUT')
                        <div class="mb-3">
                            <label for="name" class="form-label">Nama *</label>
                            <input type="text" class="form-control" name="name"
                                placeholder="silahkan masukan nama" value=" {{ $edit->name }} ">
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email *</label>
                            <input type="email" class="form-control" name="email"
                                placeholder="silahkan masukan email" value=" {{ $edit->email }} ">
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Password *</label>
                            <input type="password" class="form-control" name="password"
                                placeholder="silahkan masukan password" value=" {{ $edit->password }} ">
                                <span class="text-muted">
                                    <small>
                                        )* silahkan diisi jika ingin merubah password
                                    </small>
                                </span>
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