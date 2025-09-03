<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
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

    public function lokasi()
    {
        return $this->belongsTo(Location::class, 'id_lokasi', 'id');
    }

    public function kategori()
    {
        return $this->belongsTo(Categorie::class, 'id_kategori', 'id');
    }
}
