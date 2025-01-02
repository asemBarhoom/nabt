<?php

namespace App\Models;

use App\Models\Traits\SharedTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\BaseModel as Model;

class Landmark extends Model
{
    use HasFactory,SharedTrait;
    public array $translatable = ['title', 'body'];

    protected $fillable = [
        'title',
        'body',
        'image',
        'status',
    ];
}
