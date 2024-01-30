<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOneThrough;
use Illuminate\Support\Arr;

class Reservation extends Model
{
    use HasFactory;

    protected $fillable = ['uuid']; // Co to oznacza?
    protected $primaryKey = 'uuid';
    public $incrementing = false;

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function repertoire(): BelongsTo
    {
        return $this->belongsTo(Repertoire::class);
    }

    public function room(): HasOneThrough
    {
        return $this->hasOneThrough(Room::class, Repertoire::class);
    }

    public function movie(): HasOneThrough
    {
        return $this->hasOneThrough(Movie::class, Repertoire::class);
    }
    /**
     * Reserve a seat.
     */
    public static function reserveSeat($seat_number, $available_seats)
    {
        $arr = json_decode($available_seats, true);
        Arr::pull($arr, $seat_number-1);
        return json_encode($arr);
    }

      /**
     * Reserve a seat.
     */
    public static function retrieveSeat($seat_number, $available_seats)
    {
        $arr = json_decode($available_seats, true);
        $arr = Arr::add($arr, $seat_number-1, $seat_number);
        return json_encode($arr);
    }
}
