<?php
namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use Illuminate\Support\Facades\Auth;
use App\Models\Booking;

class BookingBelongsToUser implements Rule
{
    /**
     * The user ID to check the booking against.
     *
     * @var int
     */
    protected $userId;

    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->userId = auth()->guard('api')->user()->id; // Get the authenticated user's ID
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
        // Check if the booking exists and belongs to the authenticated user
        return Booking::where('id', $value)->where('user_id', $this->userId)->exists();
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'The provided booking does not belong to the authenticated user.';
    }
}
