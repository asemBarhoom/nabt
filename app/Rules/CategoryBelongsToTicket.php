<?php
namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use App\Models\Category;

class CategoryBelongsToTicket implements Rule
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
        // Check if the category exists and the categoriable_type is 'App\Models\Ticket'
        return Category::where('id', $value)
            ->where('categoriable_type', 'App\Models\Ticket')
            ->exists();
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'The category must belong to the App\Models\Ticket model.';
    }
}
