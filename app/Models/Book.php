<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Book extends Model
{   
    // protected $fillable = ['title','isbn', 'author', 'image_path', 'publisher', 'category', 'pages', 'language', 'publish_date', 'subjects', 'desc'];
    protected $guarded = ['id'];
    use HasFactory;

    public function author(): BelongsTo{
        return $this->belongsTo(Author::class);
    }
}
