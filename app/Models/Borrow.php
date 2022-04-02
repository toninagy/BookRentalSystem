<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Borrow extends Model
{
    protected $fillable = [
        'reader_id',
        'book_id',
        'status',
        'request_processed_at',
        'request_managed_by',
        'deadline',
        'returned_at',
        'return_managed_by'
    ];

    public function readerBorrows() {
        return $this->hasOne(User::class, 'id');
      }

    public function bookBorrowed() {
        return $this->hasOne(Book::class, 'id');
      }
}
