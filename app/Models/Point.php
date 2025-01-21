<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\BaseModel as Model;

class Point extends Model
{
    use HasFactory;
    public array $translatable = ['description', 'notes'];

    protected $guarded = [];
}
