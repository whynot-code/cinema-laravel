<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Ticket extends Model
{
    use HasFactory;

    protected $fillable = ['uuid'];
    
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function repertoire(): BelongsTo
    {
        return $this->belongsTo(Repertoire::class);
    }
}
