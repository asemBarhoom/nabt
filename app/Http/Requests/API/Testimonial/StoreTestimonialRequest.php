<?php

namespace App\Http\Requests\API\Testimonial;

use App\Http\Requests\BaseRequest as FormRequest;
use App\Rules\TestimonialsableIdExists;

class StoreTestimonialRequest extends FormRequest
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
            'body' => 'nullable|string|max:1000',
            'rating' => 'required|numeric|min:0|max:5',
            'testimonialsable_id' => ['required', 'integer', new TestimonialsableIdExists()],
            'testimonialsable_type' => 'required|string|in:App\Models\Destination,App\Models\Booking,App\Models\Tourevent,App\Models\Accommodation',
        ];
    }

}
