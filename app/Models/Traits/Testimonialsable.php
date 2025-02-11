<?php

namespace App\Models\Traits;

use App\Models\Testimonial;

trait Testimonialsable
{
    // Define the polymorphic relationship
    public function testimonials()
    {
        return $this->morphMany(Testimonial::class, 'testimonialsable');
    }

    // Add a testimonial to the model
    public function addTestimonial($name, $position, $body, $rating, $image = null)
    {
        return $this->testimonials()->create([
            'name' => $name,
            'position' => $position,
            'body' => $body,
            'rating' => $rating,
            'image' => $image,
        ]);
    }

    // Remove a specific testimonial from the model
    public function removeTestimonial($testimonialId)
    {
        return $this->testimonials()->where('id', $testimonialId)->delete();
    }

    // Get the first testimonial (e.g., for a featured testimonial)
    public function getFirstTestimonial()
    {
        return $this->testimonials()->first();
    }

    // Remove all testimonials related to the model
    public function clearTestimonials()
    {
        return $this->testimonials()->delete();
    }

    /**
     * Scope for filtering models based on average rating.
     */
    public function scopeFilterByRating($query, ?float $rateNumber)
    {
        return $query->withAvg('testimonials', 'rating')
            ->when($rateNumber, fn($q) => $q->having('testimonials_avg_rating', '=', $rateNumber));
    }

}
