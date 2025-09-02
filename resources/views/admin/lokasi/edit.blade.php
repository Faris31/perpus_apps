@extends('app')
@section('title', 'Ubah Lokasi')
@section('content')

<div class="row">
    <div class="col-sm-12">
        <div class="card">
            <div class="card-body">
                <h3 class="card-title">{{ $title ?? '' }}</h3>
                <form action=" {{ route('lokasi.update', $edit->id) }} " method="post">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="mb-3">
                            <label for="kode_lokasi" class="form-label">Kode Lokasi *</label>
                            <input type="text" class="form-control" name="kode_lokasi"
                                placeholder="silahkan masukan kode lokasi" value=" {{ $edit->kode_lokasi }} ">
                        </div>

                        <div class="mb-3">
                            <label for="label" class="form-label">Label *</label>
                            <input type="text" class="form-control" name="label" placeholder="silahkan masukan kode lokasi" value=" {{ $edit->label }} ">
                        </div>

                        <div class="mb-3">
                            <label for="rak" class="form-label">Rak *</label>
                            <input type="text" class="form-control" name="rak"
                                placeholder="silahkan masukan nama"  value=" {{ $edit->rak }} ">
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