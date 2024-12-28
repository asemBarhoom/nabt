<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\BaseModel as Model;

class Event extends Model
{
    use HasFactory;
    public array $translatable = ['title'];

    protected $fillable = [
        'title',
    ];
}
