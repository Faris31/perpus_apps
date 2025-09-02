<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class book extends Model
{
    protected $fillable = [
        'id',
        'id_lokasi',
        'id_kategori',
        'judul_buku',
        'pengarang_buku',
        'penerbit_buku',
        'tahun_terbit',
        'keterangan',
        'stok_buku'
    ];
}
