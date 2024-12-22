<?php

namespace App\Rules;

use App\Helpers\Constant;
use Illuminate\Contracts\Validation\Rule;

class FilterRule implements Rule
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
        $fields = json_encode($value, JSON_UNESCAPED_UNICODE);
        return $this->validateRegex($attribute, $fields, [Constant::JSON_REGEX]);
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return trans('validation.custom.filters');
    }
}
