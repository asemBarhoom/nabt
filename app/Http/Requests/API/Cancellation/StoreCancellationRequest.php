<?php

namespace App\Http\Requests\API\Cancellation;

use App\Http\Requests\BaseRequest as FormRequest;
use App\Rules\BookingBelongsToUser;
use App\Rules\CategoryBelongsToCancellation;

class StoreCancellationRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules(): array
    {
        return [
            'title' => 'required|string|max:255',
            'body' => 'required|string',
            'booking_id' => $this->bookingValidationRules(),
            'category_id' => $this->categoryValidationRules(),
        ];
    }

    /**
     * Get the validation rules for booking_id.
     *
     * @return array
     */
    protected function bookingValidationRules(): array
    {
        return [
            'required',
            'exists:bookings,id',  // Ensure booking exists
            new BookingBelongsToUser(),  // Custom rule to ensure the booking belongs to the authenticated user
        ];
    }

    /**
     * Get the validation rules for category_id.
     *
     * @return array
     */
    protected function categoryValidationRules(): array
    {
        return [
            'required',
            'exists:categories,id',  // Ensure category exists
            new CategoryBelongsToCancellation(),  // Custom rule to ensure the category belongs to the Cancellation model
        ];
    }
}
