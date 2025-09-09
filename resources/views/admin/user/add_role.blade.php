@extends('app')
@section('title', 'Tambah Role')
@section('content')
<style>
    /* Styling opsi yang terpilih */
    select.form-select option:checked {
        background-color: pink;
        /* Warna Bootstrap primary */
        color: black;
    }
</style>
<div class="row">
    <div class="col-sm-12">
        <div class="card">
            <div class="card-body">
                <h3 class="card-title">{{ $title ?? '' }}</h3>

                <form action="{{ route('user.updateRoles',$user->id) }}" method="post">
                    @csrf
                    <div class="mb-3">
                        <label for="role" class="form-label">Pilih Role</label>
                        <select name="roles[]" id="role" class="form-select" multiple>
                            @foreach ($roles as $role)
                            <option value="{{ $role->id }}"
                                {{ $user->roles->contains('id', $role->id) ? 'selected' : '' }}>
                                {{ $role->name }}
                            </option>
                            @endforeach
                        </select>

                    </div>
                    <div class="mb-3">
                        <button class="btn btn-primary">Simpan</button>
                        <a href="{{ url()->previous() }}" class="btn">Kembali</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection