<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Borrows extends Model
{
    protected $fillable = [
            'id_anggota',
            'trans_number',
            'return_date',
            'note'
    ];
}
