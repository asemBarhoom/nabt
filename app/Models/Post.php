<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\BaseModel as Model;

class Post extends Model
{
    use HasFactory;
    public array $translatable = ['title', 'body'];

    protected $fillable = [
        'title',
        'body',
        'image',
        'status',
    ];
}
