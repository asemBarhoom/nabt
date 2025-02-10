<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\BaseModel as Model;

class Redemption extends Model
{
    use HasFactory;
    public array $translatable = [];
    protected $fillable = [
        'user_id',
        'reward_id',
        'points_deducted',
        'credit_received',
        'remaining_credit',
    ];

    // Relationships
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function reward()
    {
        return $this->belongsTo(Reward::class);
    }
}
