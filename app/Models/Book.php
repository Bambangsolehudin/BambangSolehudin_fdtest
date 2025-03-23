<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'author', 'description', 'thumbnail', 'rating'];

    public function setThumbnailAttribute($value)
    {
        $this->attributes['thumbnail'] = $value ?? 'default.jpg';
    }

}
