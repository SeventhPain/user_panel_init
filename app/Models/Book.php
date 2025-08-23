<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $fillable = ['title', 'description','title_mm', 'description_mm', 'book_type_id', 'cover_image', 'file_path'];

    public function type()
    {
        return $this->belongsTo(BookType::class, 'book_type_id');
    }
}
