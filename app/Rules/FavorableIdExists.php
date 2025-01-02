<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class FavorableIdExists implements Rule
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
        $favorableType = request()->input('favorable_type');

        if ($favorableType === 'App\Models\Destination') {
            return \App\Models\Destination::find($value) !== null;
        }
        // Add other elseif conditions for other favorable_type values

        return false; // Default to false if favorable_type is not recognized

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
