<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\BaseModel as Model;

class Subscribe extends Model
{
    use HasFactory;
    public array $translatable = [];

    protected $fillable = [
        'email',
        'status',
    ];
}
