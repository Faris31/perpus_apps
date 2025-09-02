@extends('app')
@section('title', 'Tambah Lokasi Buku')
@section('content')

<div class="row">
    <div class="col-sm-12">
        <div class="card">
            <div class="card-body">
                <h3 class="card-title">{{ $title ?? '' }}</h3>
                <div>
                    @foreach ($errors->all() as $i )
                    <ul class="" style="background-color: red">
                        <li>{{ $i }}</li>
                    </ul>
                    @endforeach
                </div>
                <form action="{{ route('kategori.store') }}" method="post">
                    @csrf
                    <div class="row">
                        <div class="mb-3">
                            <label for="nama_kategori" class="form-label">Nama Kategori *</label>
                            <input type="text" class="form-control" name="nama_kategori"
                                placeholder="silahkan masukan kode lokasi" value="">
                        </div>

                        <div class="mb-3">
                            <button class="btn btn-primary" type="submit" name="simpan">Submit</button>
                            <a href="{{url()->previous()}}" class="text-muted">Kembali</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection