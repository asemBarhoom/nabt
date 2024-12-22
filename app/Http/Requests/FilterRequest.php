<?php

namespace App\Http\Requests;

use App\Rules\FilterRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class FilterRequest extends FormRequest
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
            'page'                  => 'nullable|integer',
            'per_page'              => 'nullable|integer',
            'filters'               => ['nullable', 'array', new FilterRule],
            'filters.is_active'=> ['nullable','numeric', Rule::in([1,0])],
            'filter_operator'       => 'nullable|string',
            'order_by'              => 'nullable|string',
            'order_by_direction'    => 'nullable|string|in:asc,desc'
        ];
    }
}
