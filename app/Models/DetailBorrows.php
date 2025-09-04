<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class DetailBorrows extends Model
{
    protected $fillable = [
        'id_borrow',
        'id_book'
    ];

    // relation orm ke table borrow
    public function borrow()
    {
        return $this->belongsTo(Borrows::class, 'id_borrow', 'id');
    }

    // relation orm ke table books
    public function book()
    {
        return $this->belongsTo(Book::class, 'id_book', 'id');
    }
}
