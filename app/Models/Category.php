<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\BaseModel as Model;

class Category extends Model
{
    use HasFactory;
    public array $translatable = ['name', 'body'];

    protected $fillable = [
        'name',
        'body',
        'rating',
        'image',
        'status',
    ];
}
