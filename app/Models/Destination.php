<?php

namespace App\Models;

use App\Models\Traits\Favorable;
use App\Models\Traits\Imageable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\BaseModel as Model;

class Destination extends Model
{
    use HasFactory,Favorable,Imageable;
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
