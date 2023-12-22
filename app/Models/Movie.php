<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Movie extends Model
{
    use HasFactory;

    /**
     * Get the category that owns the movie.
     */
    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }
}
