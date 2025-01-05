<?php

namespace App\Rules;

use App\Helpers\Constant;
use Illuminate\Contracts\Validation\Rule;
use Illuminate\Validation\Concerns\ValidatesAttributes;

class FilterRule implements Rule
{
    use ValidatesAttributes;


    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $fields){
        // //get fields
        // $fields = collect($fields);
        // //check fields
        // $results = $fields->map(function($value, $field){
        //     return
        //             preg_match('/^[a-zA-Z0-9_.-]*$/', $field)
        //             &&
        //             (
        //                 (is_numeric($value) || is_string($value) || empty($value) ||( is_array($value) && self::arrayOfStrings(collect($value)->flatten()) )
        //                 )
        //                 ||
        //                 ($field === Constant::BETWEEN && $value && is_array($value) && self::arrayOfStrings(collect($value)->flatten()) && self::validateFields($value))
        //             );
        // });
        // //results
        // return !$results->contains(false);
        $fields = json_encode($fields, JSON_UNESCAPED_UNICODE);
        return $this->validateRegex($attribute, $fields, [Constant::JSON_REGEX]);
    }


    // public static function validateFields($array){
    //     return !collect($array)->map(function($item, $key){
    //         return preg_match('/^[a-zA-Z0-9_.-]*$/', $key);
    //     })->contains(false);
    // }

    // public static function arrayOfStrings($array){
    //     return !$array->map(function($item){
    //         return is_numeric($item) || is_string($item) || empty($item);
    //     })->contains(false);
    // }

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
