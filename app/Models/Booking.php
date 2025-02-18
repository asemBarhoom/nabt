<?php

namespace App\Models;

use App\Helpers\General;
use App\Models\Traits\Favorable;
use App\Models\Traits\SharedTrait;
use App\Models\Traits\Statusable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\BaseModel as Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
//use chillerlan\QRCode\QRCode;
//use SimpleSoftwareIO\QrCode\Facades\QrCode;
use chillerlan\QRCode\QRCode;


class Booking extends Model
{
    use HasFactory,SharedTrait,Statusable,Favorable;

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
        'pending' => '#FFE5B4',         // Light Peach (Pleasant Orange Tone)
        'confirmed' => '#C8E6C9',       // Light Mint Green (Soft and Positive)
        'in_progress' => '#BBDEFB',     // Light Sky Blue (Calm and Active)
        'cancellation_requested' => '#FFF9C4', // Pale Yellow (Soft Attention)
        'cancellation_rejected' => '#FFCCBC',  // Light Salmon (Gentle Warning)
        'completed' => '#A5D6A7',       // Muted Green (Success and Calm)
        'cancelled' => '#FFCDD2',       // Light Rose Red (Subtle Cancel Indicator)
    ];



    public function getStatusFlow()
    {
        $statuses = array_map(function ($status) {
            return [
                'key' => $status,
                'value' => t($status),
                'color' => self::STATUS_COLORS[$status] ?? '#000000', // Default to black if color not found
            ];
        }, self::STATUS_FLOW);

        return response()->json([
            'status' => 'success',
            'data' => $statuses,
        ]);
    }

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





    public function generateQrCode()
    {
        // Fetch related data
        $bookingData = [
            "reservation_number" => $this->reservation_number,
            "status" => $this->status,
            "trip_duration" => $this->trip_duration,
//            "user" => [
//                "name" => $this->user->name ?? "Unknown",
//                "phone" => $this->user->prefix . ' ' . $this->user->phone,
//                "email" => $this->user->email ?? "No Email",
//                "job" => $this->user->job ?? "No Job",
//                "address" => $this->user->address ?? "No Address",
//            ],
            "destination" => $this->destination->name ?? "Unknown Destination",
            "accommodation" => $this->accommodation->title ?? "No Accommodation",
            "booking_date" => $this->booking_date,
            "arrival_time" => $this->arrival_time,
            "num_adults" => $this->num_adults,
            "num_children" => $this->num_children,
            "num_rooms" => $this->num_rooms,
            "room_type" => $this->room_type,
            "price" => $this->price,
        ];

        // Convert booking data to JSON
        $qrData = json_encode($bookingData, JSON_UNESCAPED_UNICODE);

        // Generate QR Code
        return (new QRCode)->render($qrData);
    }

    protected static function boot()
    {
        parent::boot();

        // Listen for the 'creating' event to generate reservation_number
        static::creating(function ($booking) {
            $booking->reservation_number = General::generateReservationNumber();
        });
    }
}
