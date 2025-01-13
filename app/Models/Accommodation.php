<?php

namespace App\Models;

use App\Models\Traits\Favorable;
use App\Models\Traits\Imageable;
use App\Models\Traits\SharedTrait;
use App\Models\Traits\Testimonialsable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\BaseModel as Model;

class Accommodation extends Model
{
    use HasFactory,SharedTrait,Imageable,Testimonialsable,Favorable;
    public array $translatable = ['title', 'body'];
    protected $appends = ['rating'];

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

    // Accessor to calculate average rating
    public function getRatingAttribute()
    {
        return $this->testimonials()->avg('rating') ?: 0; // Return 0 if no testimonials
    }
}
