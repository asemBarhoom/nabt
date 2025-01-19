<?php

namespace App\Models;

use App\Models\Traits\Statusable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\BaseModel as Model;

class Ticket extends Model
{
    use HasFactory,Statusable;
    public array $translatable = [];
    protected $guarded = [];
    protected $with = ['category', 'booking', 'user'];

    // Define the status flow for a ticket
    public const STATUS_FLOW = [
        'open',                  // التذكرة مفتوحة
        'in_progress',           // التذكرة قيد التنفيذ
        'waiting_for_approval',  // التذكرة في انتظار الموافقة
        'resolved',              // التذكرة تم حلها
        'closed',                // التذكرة مغلقة
        'reopened',              // التذكرة تم فتحها مرة أخرى
        'cancelled',             // التذكرة ملغاة
    ];

// Define the corresponding status colors for a ticket
    public const STATUS_COLORS = [
        'open' => '#FFE5B4',             // Light Peach (New/Active Ticket)
        'in_progress' => '#BBDEFB',      // Light Sky Blue (In Progress)
        'waiting_for_approval' => '#FFF9C4', // Pale Yellow (Awaiting Approval)
        'resolved' => '#A5D6A7',         // Muted Green (Successfully Resolved)
        'closed' => '#FFCDD2',           // Light Rose Red (Closed Ticket)
        'reopened' => '#FFEB3B',         // Yellow (Reopened Ticket)
        'cancelled' => '#FFCCBC',        // Light Salmon (Cancelled Ticket)
    ];


    public function booking()
    {
        return $this->belongsTo(Booking::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
