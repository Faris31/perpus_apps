@extends('app')
@section('title', 'Ubah Anggota')
@section('content')

<div class="row">
    <div class="col-sm-12">
        <div class="card">
            <div class="card-body">
                <h3 class="card-title">{{ $title ?? '' }}</h3>
                <div>
                    @foreach ($errors->all() as $i )
                    <ul style="background-color: red">
                        <li>{{ $i }}</li>
                    </ul>
                    @endforeach
                </div>
                <form action=" {{ route('anggota.update', $edit->id) }} " method="post">
                    @csrf
                    <div class="row">
                        <div class="mb-3">
                            <label for="" class="form-label">No Anggota *</label>
                            <input type="text" class="form-control" name="nomor_anggota" placeholder="silahkan masukan nomor anggota" readonly value="{{ $edit->nomor_anggota }}">
                        </div>

                        <div class="mb-3">
                            <label for="" class="form-label">NIK *</label>
                            <input type="text" class="form-control" name="nik" placeholder="silahkan masukan nik"  value="{{ $edit->nik ?? old('nik') }}">
                        </div>

                        <div class="mb-3">
                            <label for="" class="form-label">Nama Anggota *</label>
                            <input type="text" class="form-control" name="nama_anggota" placeholder="silahkan masukan nama"  value="{{ $edit->nama_anggota ?? old('nama_anggota')  }}">
                        </div>

                        <div class="mb-3">
                            <label for="" class="form-label">No. Telp *</label>
                            <input type="text" class="form-control" name="no_tlp" placeholder="silahkan masukan no tlp"  value="{{ $edit->no_tlp ?? old('no_tlp') }}">
                        </div>

                        <div class="mb-3">
                            <label for="" class="form-label">Email *</label>
                            <input type="email" class="form-control" name="email" placeholder="silahkan masukan email"  value="{{ $edit->email ?? old('email') }}">
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
{{-- {{ route('anggota.update', $edit->id) }} --}}

@endsection