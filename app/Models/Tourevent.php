<?php

namespace App\Models;

use App\Models\Traits\Favorable;
use App\Models\Traits\Imageable;
use App\Models\Traits\SharedTrait;
use App\Models\Traits\Testimonialsable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\BaseModel as Model;

class Tourevent extends Model
{
    use HasFactory,Imageable,Testimonialsable,Favorable,SharedTrait;
    public array $translatable = ['name', 'position', 'body','description'];

    protected $fillable = [
        'name',
        'position',
        'body',
        'description',
        'rating',
        'image',
        'cover_image',
        'at',
        'status',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
