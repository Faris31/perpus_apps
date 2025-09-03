@extends('app')
@section('title', 'Tambah Anggota')
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
                <form action="{{ route('anggota.store') }}" method="post">
                    @csrf
                    <div class="row">
                        <div class="mb-3">
                            <label for="" class="form-label">Nomor Anggota *</label>
                            <input type="text" class="form-control" name="nomor_anggota"
                                placeholder="silahkan masukan nomor anggota" readonly value="{{ $code }}">
                        </div>

                        <div class="mb-3">
                            <label for="" class="form-label">NIK *</label>
                            <input type="text" class="form-control" name="nik" placeholder="silahkan masukan nik"
                                 value=" {{old('nik')}} ">
                        </div>

                        <div class="mb-3">
                            <label for="" class="form-label">Nama Anggota *</label>
                            <input type="text" class="form-control" name="nama_anggota"
                                placeholder="silahkan masukan nama"  value=" {{old('nama_anggota')}} ">
                        </div>

                        <div class="mb-3">
                            <label for="" class="form-label">No. Telp *</label>
                            <input type="text" class="form-control" name="no_tlp" placeholder="silahkan masukan no telp"
                                 value=" {{old('no_tlp')}} ">
                        </div>

                        <div class="mb-3">
                            <label for="" class="form-label">Email *</label>
                            <input type="email" class="form-control" name="email" placeholder="silahkan masukan email"
                                 value=" {{old('email')}} ">
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