<?php

namespace App\Http\Requests\API\Ticket;


use App\Helpers\FileHelper;
use App\Http\Requests\BaseRequest as FormRequest;
use App\Rules\BookingBelongsToUser;
use App\Rules\CategoryBelongsToTicket;
use Str;

class StoreTicketRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'category_id' => [
                'required',
                'exists:categories,id',
                new CategoryBelongsToTicket(),
            ],
            'booking_id' => [
                'required',
                'exists:bookings,id',
                new BookingBelongsToUser(),
            ],
            'body' => 'required|string',
            'attachment_path' => 'nullable',
            'user_id' => 'required',
            'ticket_id' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'category_id.required' => 'The category ID is required.',
            'category_id.exists' => 'The selected category does not exist.',
            'booking_id.required' => 'The booking ID is required.',
            'booking_id.exists' => 'The selected booking does not exist.',
            'user_id.required' => 'The user ID is required.',
            'user_id.exists' => 'The selected user does not exist.',
            'body.required' => 'The ticket body is required.',
            'body.string' => 'The ticket body must be a string.',
        ];
    }

    protected function prepareForValidation()
    {
        if ($this->has('attachment_path') && !is_string($this->attachment_path)) {
            $attachmentPath = FileHelper::uploadFile($this->attachment_path, 'public/tickets');
            $attachmentPath = str_replace('public/','storage/',$attachmentPath);

            $this->merge([
                'attachment_path' => $attachmentPath,
            ]);
        }

        $this->merge([
            'user_id' => auth()->guard('api')->user()->id,
        ]);

        $this->merge([
            'ticket_id' => 'TICKET-' . Str::random(8),
        ]);
    }
}
