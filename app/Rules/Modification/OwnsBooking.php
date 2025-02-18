<?php
namespace App\Rules\Modification;

use App\Models\Booking;
use Illuminate\Contracts\Validation\Rule;

class OwnsBooking implements Rule
{
    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        return Booking::query()->where('id', $value)->where('user_id', auth()->guard('api')->user()->id)->exists();
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'The selected booking does not belong to the authenticated user.';
    }
}
