<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\BaseModel as Model;

class Testimonial extends Model
{
    use HasFactory;
    public array $translatable = ['name', 'position', 'body'];

    protected $fillable = [
        'name',
        'position',
        'body',
        'rating',
        'image',
        'status',
    ];
}
