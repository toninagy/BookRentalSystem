<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'authors',
        'description',
        'genres',
        'released_at',
        'cover_image',
        'pages',
        'language_code',
        'isbn',
        'in_stock'
    ];

    public function genres() {
        return $this->hasMany(Genre::class, 'id');
    }

    public function borrows() {
        return $this->hasMany(Borrow::class, 'book_id');
      }

      public function activeBorrows() {
        return $this->getAllBorrows()->where('status', '=', 'ACCEPTED');
      }
}
