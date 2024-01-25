<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Arr;

class Repertoire extends Model
{
    use HasFactory;
    protected $fillable = ['uuid', 'available_seats'];

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

     /**
     * Creates a array of availble seats.
     */
    public static function makeSeatsArray($seats_number)
    {
        $arr = [];
        for($i=1; $i <= $seats_number; $i++)
        {
            array_push($arr, $i);
        }
        return $arr;
    }

}
