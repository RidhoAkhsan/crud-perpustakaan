<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BookGallery extends Model
{
    use HasFactory;

    protected $fillable = [
        'books_id',
        'url'
    ];

    public function book()
    {
        return $this->belongsTo(Book::class);
    }

    public function getUrlAttribute($value)
    {
        return asset('/storage/books/' . $value);
    }
}
