<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Category;


class Book extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'category_id',
        'title',
        'author',
        'slug',
        'description',
        'number',
    ];

    public function category()
{
    return $this->belongsTo(Category::class, 'category_id', 'id');
}

    public function galleries()
    {
        return $this->hasMany(BookGallery::class, 'books_id', 'id');
    }

}
