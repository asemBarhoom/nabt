<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\BaseModel as Model;

class Reward extends Model
{
    use HasFactory;
    public array $translatable = [];

    protected $guarded = [];
}
