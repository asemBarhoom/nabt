<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\BaseModel as Model;

class Step extends Model
{
    use HasFactory;
    public array $translatable = [
        'title',
        'name',
        'body'
    ];

    protected $fillable = [
        'name',
        'title',
        'body',
        'order',
        'status',
    ];
}
