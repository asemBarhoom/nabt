<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\BaseModel as Model;

class Status extends Model
{
    use HasFactory;
    public array $translatable = [];

    protected $fillable = [
        'status',
        'user_id',
        'color',
        'statusable_id',
        'statusable_type',
    ];

    // Polymorphic relationship
    public function statusable()
    {
        return $this->morphTo();
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
