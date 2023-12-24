<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Repertoire extends Model
{
    use HasFactory;

     /**
     * Get the room that owns the repertoire.
     */
    public function room(): BelongsTo
    {
        return $this->belongsTo(Room::class);
    }

      /**
     * Get the movie that owns the repertoire.
     */
    public function movie(): BelongsTo
    {
        return $this->belongsTo(Movie::class);
    }
}
