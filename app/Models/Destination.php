<?php

namespace App\Models;

use App\Models\Traits\Categoriable;
use App\Models\Traits\Favorable;
use App\Models\Traits\Imageable;
use App\Models\Traits\Testimonialsable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\BaseModel as Model;

class Destination extends Model
{
    use HasFactory,Favorable,Imageable,Testimonialsable,Categoriable;
    public array $translatable = [
        'name',
        'body',
        'description',
        'weather_description',
        'amenities',
        'recommended_visit_season',
    ];

    protected $guarded = [];

    protected $appends = ['rating'];


    // Accessor to calculate average rating
    public function getRatingAttribute()
    {
        return $this->testimonials()->avg('rating') ?: 0; // Return 0 if no testimonials
    }
}
