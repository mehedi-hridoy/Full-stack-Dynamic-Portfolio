<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $fillable = [
        'title',
        'body',
        'image_path',
        'slug',
        'published_at',
    ];

    protected $casts = [
        'published_at' => 'datetime',
    ];

    // Simple accessor for image URL
    public function getImageUrlAttribute()
    {
        return $this->image_path
            ? asset('storage/'.$this->image_path)
            : 'https://placehold.co/800x400?text=No+Image';
    }
}
