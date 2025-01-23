<?php

namespace App\Models;

use App\Models\Traits\Testimonialsable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\BaseModel as Model;

class Testimonial extends Model
{
    use HasFactory,Testimonialsable;
    public array $translatable = ['body'];
    protected $appends = ['can_del','name','position','image'];

    protected $guarded = [];

    // Polymorphic relationship
    public function testimonialsable()
    {
        return $this->morphTo();
    }

    public function user()
    {
       return $this->belongsTo(User::class);
    }

    public function getnameAttribute()
    {
        return $this->user->name;
    }

    public function getPositionAttribute()
    {
        return $this->user->job;
    }

    public function getImageAttribute()
    {
        return $this->user->image;
    }
}
