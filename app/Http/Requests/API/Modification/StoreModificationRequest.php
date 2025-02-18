<?php

namespace App\Http\Requests\API\Modification;

use App\Http\Requests\BaseRequest as FormRequest;
use App\Rules\Modification\OwnsBooking;

class StoreModificationRequest extends FormRequest
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
            'body' => 'required|string|max:1000',
            'booking_id' => ['required','exists:bookings,id',new OwnsBooking()],
        ];
    }

}
