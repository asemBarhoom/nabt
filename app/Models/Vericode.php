<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\BaseModel as Model;

class Vericode extends Model
{
    use HasFactory;
    public array $translatable = [];

    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
