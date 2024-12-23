<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\BaseModel as Model;

class Tourevent extends Model
{
    use HasFactory;
    public array $translatable = ['name', 'position', 'body'];

    protected $fillable = [
        'name',
        'body',
        'rating',
        'image',
        'status',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
