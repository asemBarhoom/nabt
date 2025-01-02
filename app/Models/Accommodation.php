<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\BaseModel as Model;

class Accommodation extends Model
{
    use HasFactory;
    public array $translatable = ['title', 'body'];

    protected $fillable = [
        'image',
        'title',
        'type',
        'body',
        'price',
        'rooms',
        'restaurants',
        'cafes',
        'wifi',

    ];

}
