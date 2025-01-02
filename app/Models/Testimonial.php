<?php

namespace App\Models;

use App\Models\Traits\Testimonialsable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\BaseModel as Model;

class Testimonial extends Model
{
    use HasFactory,Testimonialsable;
    public array $translatable = ['name', 'position', 'body'];

    protected $fillable = [
        'name',
        'position',
        'body',
        'rating',
        'image',
        'status',
    ];

    // Polymorphic relationship
    public function testimonialsable()
    {
        return $this->morphTo();
    }
}
