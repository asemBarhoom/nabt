<?php

namespace App\Models;

use App\Models\Traits\SharedTrait;
use App\Models\Traits\Statusable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\BaseModel as Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Booking extends Model
{
    use HasFactory,SharedTrait,Statusable;

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

    // Define the status flow for a booking
    public const STATUS_FLOW = [
        'pending',              // الحجز في حالة الانتظار
        'confirmed',            // تم تأكيد الحجز
        'in_progress',          // الحجز قيد التنفيذ
        'cancellation_requested', // طلب إلغاء الحجز في انتظار الموافقة
        'cancellation_rejected',  // تم رفض طلب الإلغاء
        'completed',            // تم إكمال الحجز
        'cancelled',            // تم إلغاء الحجز
    ];


    public const STATUS_COLORS = [
        'pending' => '#FFA500',               // Orange
        'confirmed' => '#008000',             // Green
        'in_progress' => '#0000FF',           // Blue
        'cancellation_requested' => '#FFD700', // Yellow (Pending cancellation request)
        'cancellation_rejected' => '#FF4500',  // Orange-Red (Cancellation request rejected)
        'completed' => '#4CAF50',             // Dark Green
        'cancelled' => '#FF0000',             // Red
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
