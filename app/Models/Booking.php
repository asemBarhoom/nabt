<?php

namespace App\Models;

use App\Models\Traits\SharedTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\BaseModel as Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Booking extends Model
{
    use HasFactory,SharedTrait;

    public array $translatable = ['trip_duration'];

    protected $fillable = [
        'reservation_number',
        'trip_duration',
        'user_id',
        'destination_id',
        'accommodation_id',
        'tourevent_id',
        'booking_date',
        'arrival_time',
        'num_adults',
        'num_children',
        'num_rooms',
        'room_type',
        'num_meals',
        'meal_notes',
        'trip_type',
        'food_allergies',
        'vehicle_type',
        'vehicle_description',
    ];

    // Defining the relationships

    /**
     * Get the user that owns the booking.
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the destination associated with the booking.
     */
    public function destination(): BelongsTo
    {
        return $this->belongsTo(Destination::class);
    }

    /**
     * Get the accommodation associated with the booking.
     */
    public function accommodation(): BelongsTo
    {
        return $this->belongsTo(Accommodation::class);
    }

    public function events()
    {
        return $this->belongsToMany(Event::class, 'booking_events');
    }

    /**
     * Get the tourevent associated with the booking.
     */
    public function tourevent(): BelongsTo
    {
        return $this->belongsTo(Tourevent::class);
    }
}
