<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class TestimonialsableIdExists implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        $testimonialsableType = request()->input('testimonialsable_type');

        if ($testimonialsableType === 'App\Models\Destination') {
            return \App\Models\Destination::find($value) !== null;
        }
        if ($testimonialsableType === 'App\Models\Booking') {
            return \App\Models\Booking::find($value) !== null;
        }
        if ($testimonialsableType === 'App\Models\Tourevent') {
            return \App\Models\Tourevent::find($value) !== null;
        }

        if ($testimonialsableType === 'App\Models\Accommodation') {
            return \App\Models\Accommodation::find($value) !== null;
        }
        // Add other elseif conditions for other testimonialsable_type values

        return false; // Default to false if testimonialsable_type is not recognized

    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'The :attribute is invalid.';
    }
}
